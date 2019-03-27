<?php require_once("Manager.php");


class FolderManager extends Manager
{

    private $user;
    private $type;
    private $label;
    private $db;

    public function __construct($user, $type, $label)
    {
        $this->user = $user;
        $this->type = $type;
        $this->label = $label;
        $this->db = $this->bdd();
    }

    public function getDb()
    {
        return $this->db;
    }

    public function addFolder()
    {
        $path = "public/doc/$this->label";
        $old = umask(0);
        if (mkdir($path, 0777)) {
            umask($old);
            $sql = "INSERT INTO folder(label, path, type, user)
                    VALUE(:label, :path, :type, :user)";

            $req = $this->getDb()->prepare($sql);
            $req->execute(array(
                'user' => $this->user,
                'type' => $this->type,
                'label' => $this->label,
                'path' => $path
            ));
            return 1;
        }


    }

    public function editFolder($id, $name = null, $url)
    {
        if ($this->category == 'vidéos') {
            $sql = "UPDATE folder SET user=:user, type=:type, category=:category
                ,url=:url, label=:label, path=:path WHERE id_folder=:id";

            $req = $this->getDb()->prepare($sql);
            $req->execute(array(
                'user' => $this->user,
                'type' => $this->type,
                'category' => $this->category,
                'url' => $url,
                'label' => $this->label,
                'path' => $this->path,
                'id' => $id
            ));
            return 1;
        } else {
            $myurl = $this->addImg($name, $url);
            $sql = "UPDATE folder SET user=:user, type=:type, category=:category
                ,url=:url, label=:label, path=:path WHERE id_folder=:id";

            $req = $this->getDb()->prepare($sql);
            $req->execute(array(
                'user' => $this->user,
                'type' => $this->type,
                'category' => $this->category,
                'url' => $myurl,
                'label' => $this->label,
                'path' => $this->path,
                'id' => $id
            ));
            return 1;
        }

    }

    public function getDocumentToDelete($folder)
    {
        $sql = "SELECT * FROM files WHERE folder=:folder";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('folder' => $folder));
        if ($result = $req->fetchAll()) {
            return true;
        } else {
            return false;

        }
    }

    public function deleteFolder($folder)
    {
        $sup = $this->getDocumentToDelete($folder);
        if ($sup) {   
            //suppression du dossier et fichier physique
            $path = $this->getFolder(null, $folder);
            if (is_dir($path)) {
                $files = scandir($path);
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        if (filetype($path . "/" . $file) == "dir") {
                            rmdir($path . "/" . $file);
                        } else {
                            unlink($path . "/" . $file);
                        }

                    }
                }
                reset($files); // on remet à 0 les objets
                rmdir($path); // on supprime le dossier
                //suppresion des fichiers
                $sql = "DELETE FROM files WHERE folder=$folder";
                $this->bdd()->exec($sql);

                //suppresion du dossier
                $sql = "DELETE FROM folder WHERE id_folder=$folder";
                $this->bdd()->exec($sql);

            }
        } else {
            //suppression du dossier et fichier physique
            $path = $this->getFolder(null, $folder);
            if (is_dir($path)) {
                rmdir($path);
                //suppresion du dossier
                $sql = "DELETE FROM folder WHERE id_folder=$folder";
                $this->bdd()->exec($sql);
            }

        }

        return 1;
    }

    public function like($id, $likes)
    {
        $sql = "UPDATE folder SET likes=:likes WHERE id_folder=:id";
        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'likes' => $likes,
            'id' => $id
        ));
        return 1;
    }

    public function getFolder($type = null, $folder = null)
    {
        if ($type !== null) {
            $sql = "SELECT * FROM folder WHERE type=:type";

            $req = $this->bdd()->prepare($sql);
            $req->execute(array('type' => $type));
            if ($result = $req->fetchAll()) {

                return $result;
            }
        } elseif ($folder !== null) {
            $sql = "SELECT * FROM folder WHERE id_folder=:folder";

            $req = $this->bdd()->prepare($sql);
            $req->execute(array('folder' => $folder));
            if ($result = $req->fetch()) {

                return $result['path'];
            }
        } else {
            $sql = "SELECT * FROM folder WHERE id_folder<>0";

            $req = $this->bdd()->query($sql);
            if ($result = $req->fetchAll()) {

                return $result;
            }
        }


    }


    public function getId()
    {
        $sql = "SELECT id_type_folder FROM type_folder ORDER BY id_type_folder DESC LIMIT 1";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetch()) {
            return $res['id_type_folder'];
        }
    }

    public function getPossessor()
    {
        $sql = "SELECT DISTINCT(possessor) FROM folder";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetchAll()) {
            return $res;
        }
    }

    public function getFolderToUpdate($folder)
    {
        $sql = "SELECT * FROM folder WHERE id_folder=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $folder));

        if ($result = $req->fetch()) {

            return $result;
        }

    }

    public function availableFolder()
    {
        $sql = "SELECT * FROM folder WHERE available<>0";

        $req = $this->bdd()->query($sql);

        if ($result = $req->fetchAll()) {

            return $result;
        }
    }
    public function maintainFolder($folder, $month)
    {
        $sql = "SELECT COUNT(*) AS maintains_number,begin_date, SUM(price) AS totale FROM maintains WHERE MONTH(begin_date)=:mois AND  folder=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $folder,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function hireFolder($folder, $month)
    {
        $sql = "SELECT COUNT(*) AS hire_number, begin_date, SUM(price) AS totale FROM hire WHERE MONTH(begin_date)=:mois AND  id_folder=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $folder,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function garageFolder($folder, $month)
    {
        $sql = "SELECT COUNT(*) AS garage_number, begin_date , SUM(price) AS totale FROM garage WHERE MONTH(begin_date)=:mois AND  folder=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $folder,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function maintainsFolder($folder)
    {
        $sql = "SELECT v.id_folder, v.user, MONTH(m.begin_date) AS mois, v.type, m.name, m.price, SUM(m.price) AS totale_price,
        COUNT(m.name) AS maintains_number FROM folder AS v, maintains AS m WHERE  MONTH(m.begin_date)= date('m') 
        AND m.folder =:id ";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $folder));

        if ($result = $req->fetch()) {

            return $result;
        }

    }

    public function garagesFolder()
    {
        $sql = "SELECT v.id_folder, v.user, v.type, m.name, m.price, h.price, g.name, g.price, 
        COUNT(m.name) AS maintains_number, COUNT(g.name) AS garage_number FROM folder AS v, 
        maintains AS m, garage AS g WHERE g.folder = v.id_folder AND m.folder = v.id_folder AND v.id_folder =:id AND   ";
    }

    public function hiresFolder()
    {
        $sql = "SELECT v.id_folder, v.user, v.type, m.name, m.price, h.price, g.name, g.price, 
        COUNT(m.name) AS maintains_number, COUNT(g.name) AS garage_number FROM folder AS v, 
        maintains AS m, garage AS g WHERE g.folder = v.id_folder AND m.folder = v.id_folder AND v.id_folder =:id AND   ";
    }

    public function month($date)
    {
        $data = str_split($date);
        $month = $data[5] . $data[6];
        return $month;
    }


}
