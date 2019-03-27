<?php require_once("Manager.php");


class DocumentManager extends Manager
{


    public function getDb()
    {
        return $this->bdd();
    }

    public function getFolder($id)
    {
        $sql = "SELECT label FROM folder WHERE id_folder=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $id));
        if ($result = $req->fetch()) {

            return $result['label'];
        }
    }

    public function deleteFile($folder = null, $id = null)
    {
        if ($folder != null) {
            if ($folder == 0) {
                $sql = "DELETE FROM files WHERE folder=$folder";
                $this->getDb()->exec($sql);
            }
            return 1;
        } elseif ($id != null) {
           //suppression du fichier physique
            $path = $this->getDocument(null, $id);
            //echo $path; die();
            unlink($path);
               //suppresion du fichier
            $sql = "DELETE FROM files WHERE id_files=$id";
            $this->bdd()->exec($sql);
            return 1;
        }

        

    }

    public function addFile($label = [], $type = [], $size = [], $url = [], $folder, $user)
    {
        $f = $this->getFolder($folder);
        $this->deleteFile($folder);
        $all = count($label) - 1;
        for ($i = 0; $i <= $all; $i++) {
            $path = "public/doc/$f/$label[$i]";
            if (move_uploaded_file($url[$i], $path)) {
                if ($folder == 0) {
                    $type[$i] = 'défilante';
                }

                $sql = "INSERT INTO files(label, path,  size, type,  folder, user) 
            VALUE(:label, :path, :size, :type, :folder, :user)";

                $requete = $this->getDb()->prepare($sql);

                $requete->execute(array(
                    'label' => $label[$i],
                    'type' => $type[$i],
                    'size' => $size[$i],
                    'path' => $path,
                    'folder' => $folder,
                    'user' => $user
                ));
            } else {
                global $erreur;
                $erreur = "Une erreur s'est produite";
                die();
            }

        }
        return 1;
    }

    public function addDocument()
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

    public function editDocument($id, $label = null, $url)
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
            $myurl = $this->addImg($label, $url);
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

    public function getDocument($folder = null, $file = null)
    {
        if ($folder !== null) {
            $sql = "SELECT * FROM files WHERE folder=:folder";

            $req = $this->bdd()->prepare($sql);
            $req->execute(array('folder' => $folder));
            if ($result = $req->fetchAll()) {

                return $result;
            }
        } elseif ($file !== null) {
            $sql = "SELECT * FROM files WHERE id_files=:files";

            $req = $this->bdd()->prepare($sql);
            $req->execute(array('files' => $file));
            if ($result = $req->fetch()) {

                return $result['path'];
            }
        } else {
            $sql = "SELECT * FROM files";

            $req = $this->bdd()->query($sql);
            if ($result = $req->fetchAll()) {

                return $result;
            }
        }


    }





}
