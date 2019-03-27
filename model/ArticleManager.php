<?php require_once("Manager.php");


class ArticleManager extends Manager
{

    private $user;
    private $type;
    private $content;
    private $db;

    public function __construct($user, $type, $content)
    {
        $this->user = $user;
        $this->type = $type;
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
        $sql = "INSERT INTO article(user, type, url, content)
        VALUE(:user, :type, :url, :content)";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'user' => $this->user,
            'type' => $this->type,
            'url' => $myurl,
            'content' => $this->content
        ));
        return 1;
    }

    public function editArticle($id, $name = null, $url)
    {
        $myurl = $this->addImg($name, $url);
        $sql = "UPDATE article SET user=:user, type=:type, url=:url, content=:content WHERE id_article=:id";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'user' => $this->user,
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

    public function addImg($name, $url)
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

    public function sellArticle($id)
    {
        $sell = 'true';
        $sql = "UPDATE article SET sell=:sell WHERE id_article=:id";

        $req = $this->getDb()->prepare($sql);
        $req->execute(array(
            'sell' => $sell,
            'id' => $id
        ));
        return 1;
    }

    public function getId()
    {
        $sql = "SELECT id_type_article FROM type_article ORDER BY id_type_article DESC LIMIT 1";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetch()) {
            return $res['id_type_article'];
        }
    }

    public function getPossessor()
    {
        $sql = "SELECT DISTINCT(possessor) FROM article";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetchAll()) {
            return $res;
        }
    }

    public function getArticleToUpdate($article)
    {
        $sql = "SELECT * FROM article WHERE id_article=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $article));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function availableArticle()
    {
        $sql = "SELECT * FROM article WHERE available<>0";

        $req = $this->bdd()->query($sql);

        if ($result = $req->fetchAll()) {

            return $result;
        }
    }
    public function maintainArticle($article, $month)
    {
        $sql = "SELECT COUNT(*) AS maintains_number,begin_date, SUM(price) AS totale FROM maintains WHERE MONTH(begin_date)=:mois AND  article=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $article,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function hireArticle($article, $month)
    {
        $sql = "SELECT COUNT(*) AS hire_number, begin_date, SUM(price) AS totale FROM hire WHERE MONTH(begin_date)=:mois AND  id_article=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $article,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function garageArticle($article, $month)
    {
        $sql = "SELECT COUNT(*) AS garage_number, begin_date , SUM(price) AS totale FROM garage WHERE MONTH(begin_date)=:mois AND  article=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array(
            'id' => $article,
            'mois' => $month
        ));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function maintainsArticle($article)
    {
        $sql = "SELECT v.id_article, v.user, MONTH(m.begin_date) AS mois, v.type, m.name, m.price, SUM(m.price) AS totale_price,
        COUNT(m.name) AS maintains_number FROM article AS v, maintains AS m WHERE  MONTH(m.begin_date)= date('m') 
        AND m.article =:id ";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $article));

        if ($result = $req->fetch()) {

            return $result;
        }
    }

    public function garagesArticle()
    {
        $sql = "SELECT v.id_article, v.user, v.type, m.name, m.price, h.price, g.name, g.price, 
        COUNT(m.name) AS maintains_number, COUNT(g.name) AS garage_number FROM article AS v, 
        maintains AS m, garage AS g WHERE g.article = v.id_article AND m.article = v.id_article AND v.id_article =:id AND   ";
    }

    public function hiresArticle()
    {
        $sql = "SELECT v.id_article, v.user, v.type, m.name, m.price, h.price, g.name, g.price, 
        COUNT(m.name) AS maintains_number, COUNT(g.name) AS garage_number FROM article AS v, 
        maintains AS m, garage AS g WHERE g.article = v.id_article AND m.article = v.id_article AND v.id_article =:id AND   ";
    }

    public function month($date)
    {
        $data = str_split($date);
        $month = $data[5] . $data[6];
        return $month;
    }
}
