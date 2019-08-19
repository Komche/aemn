<?php require_once("Manager.php");


class ArticleManager extends Manager
{

    private $user;
    private $type;
    private $title;
    private $content;
    private $db;

    public function __construct($user, $title, $type, $content)
    {
        $this->user = $user;
        $this->type = $type;
        $this->title = $title;
        $this->content = $content;
        $this->db = $this->bdd();
    }

    public function getDb()
    {
        return $this->db;
    }

    public function deleteArticle($id)
    {
        //suppression du fichier physique
        $path = $this->getArticle($id);
        //echo $path; die();
        unlink($path['url']);
        //suppresion de l'article
        $sql = "DELETE FROM article WHERE id_article=$id";
        $this->bdd()->exec($sql);
        return 1;
    }

    public function addArticle($name = null, $url)
    {

        $myurl = $this->addImg($name, $url);
        $sql = "INSERT INTO article(user, title, type, url, content)
        VALUE(:user, :title, :type, :url, :content)";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'user' => $this->user,
            'title' => $this->title,
            'type' => $this->type,
            'url' => $myurl,
            'content' => $this->content
        ));
        return 1;
    }

    public function editArticle($id, $name = null, $url)
    {
        $myurl = $this->addImg($name, $url);
        $sql = "UPDATE article SET user=:user, title=:title, type=:type, url=:url, content=:content WHERE id_article=:id";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'user' => $this->user,
            'title' => $this->title,
            'type' => $this->type,
            'url' => $myurl,
            'content' => $this->content,
            'id' => $id
        ));
        return 1;
    }

    public function like($id, $likes)
    {
        $sql = "UPDATE article SET likes=:likes WHERE id_article=:id";
        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'likes' => $likes,
            'id' => $id
        ));
        return 1;
    }

    public function getType_article()
    {
        $sql = " SELECT * FROM type_article";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetchAll()) {
            return $res;
        }
    }

    public function addType_article($label)
    {
        $sql = "INSERT INTO type_article(label)VALUE(:label)";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'label' => $label
        ));
        return 1;
    }

    public function verifImg($name)
    {
        $extension_fichier = strrchr($name, '.');
        $extension_autorisee = array('.png', '.jpg', '.JPG', '.jpeg', '.PDF', '.pdf', '.docx', '.odp', '.doc');

        if (in_array($extension_fichier, $extension_autorisee)) {
            return 'ok';
        } else {
            global $erreur;
            $erreur = 'Seule les images sont autorisés';
            return $erreur;
        }
    }

    public static function addImg($name, $url)
    {
        $fichier_dest = 'public/article/' . $name;

        if (file_exists($fichier_dest)) {
            die("$fichier_dest existe déjà dans ce dossier");
        } else {
            if (move_uploaded_file($url, $fichier_dest)) {
                return $fichier_dest;
            }
        }
    }

    public function nbArticle()
    {
        $sql = " SELECT COUNT(*) AS nb FROM article";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetch()) {
            return $res['nb'];
        }
    }

    // public function getArticle($content)
    // {

    //     $sql = "SELECT id_article, p.user as user, type, likes, times, url, c.user AS name
    //     FROM article p
    //         LEFT JOIN title c
    //         ON c.id_title = p.title WHERE content=:content";

    //     $req = $this->bdd()->prepare($sql);
    //     $req->execute(array('content' => $content));
    //     if ($result = $req->fetchAll()) {

    //         return $result;
    //     }

    // }

    public function getArticle($id = null)
    {
        if ($id != null) {
            $sql = "SELECT * FROM article WHERE id_article=:id";

            $req = $this->bdd()->prepare($sql);
            $req->execute(['id' => $id]);
            if ($result = $req->fetch()) {

                return $result;
            }
        } else {
            $sql = "SELECT id_article, title, content, last_name, first_name, likes, dates, url
        FROM article, users WHERE user=id_user GROUP BY id_article DESC";

            $req = $this->bdd()->query($sql);
            if ($result = $req->fetchAll()) {

                return $result;
            }
        }
    }


    public function getId()
    {
        $sql = "SELECT id_type_article FROM type_article ORDER BY id_type_article DESC LIMIT 1";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetch()) {
            return $res['id_type_article'];
        }
    }

    public function getVideoArticle()
    {

        $sql = "SELECT id_article, title, content, dates, url FROM article WHERE statut=1";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }

    public function getPhotoArticle()
    {

        $sql = "SELECT * FROM article WHERE statut=2 GROUP BY title";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }

    public function getPhotoArticleType($id)
    {

        $sql = "SELECT * FROM article WHERE statut=2 and id_article='$id' GROUP BY title";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        } else {
            $this->getPhotoArticle();
        }
    }

    public function Article($id)
    {

        $sql = "SELECT id_article, title, content, last_name, first_name, likes, dates, url
        FROM article, users WHERE id_article='$id' and user=id_user";

        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {

            return $result;
        }
    }

    public function getArticleType($id)
    {
        $sql = "SELECT id_article, title, content, last_name, first_name, likes, dates, url
        FROM article, users where type='$id' GROUP BY title";

        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {

            return $result;
        }
    }
}
