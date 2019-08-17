<?php
require_once("Manager.php");

class BureauManager extends Manager
{

    public static function getBureau()
    {
        $sql = "SELECT * FROM bureau";

        $req = self::getDb()->query($sql);

        if ($result = $req->fetchAll()) {

            return $result;
        }
    }


   

    private static function verifBureau($nom_bureau, $logo)
    {
        if (empty($nom_bureau)) {
            return "Le nom du bureau ne doit pas être vide";
        }elseif (strlen($nom_bureau)<3) {
            return "Ce nom est trop pétit";
        }elseif (empty($logo)) {
            return "Le logo n'a pas été renseigné";
        }else {
            return 1;
        }
    }

    public static function addBureau($nom_bureau, $logo, $statut, $url)
    {
        $verif = self::verifBureau($nom_bureau, $logo);
        if ($verif!==1) {
            return $verif;
        }

        $myurl = $this->addImg($logo, $url);
        $sql = "INSERT INTO bureau(nom_bureau, logo, statut)
            VALUE(:nom_bureau, :logo, :statut)";
            $user = self::getDb()->prepare($sql);
            if($user->execute(array(
                'nom_bureau' => $nom_bureau,
                'logo' => $myurl,
                'statut' => $statut
            ))){
                return 1;
            }else{
                global $erreur;
                return $erreur = 'Une erreur s\'est produite lors de l\'ajout !';
            }
    }

    public static function updateBureau($id, $nom_bureau, $logo, $statut, $url)
    {
        $verif = self::verifBureau($nom_bureau, $logo);
        if ($verif!==1) {
            return $verif;
        }

        $myurl = $this->addImg($logo, $url);
        $sql = "UPDATE bureau SET nom_bureau=:nom_bureau, logo=:logo, statut=:statut
         WHERE id_bureau=:id";

        $user = self::getDb()->prepare($sql);
        $user->execute(array(
            'nom_bureau' => $nom_bureau,
            'logo' => $myurl,
            'statut' => $statut,
            'id' => $id
        ));
        return 1;
    }

    public function addImg($name, $url)
    {
        $fichier_dest = 'public/doc/' . $name;

        if (file_exists($fichier_dest)) {
            die("$fichier_dest existe déjà dans ce dossier");
        } else {
            if (move_uploaded_file($url, $fichier_dest)) {
                return $fichier_dest;
            }
        }
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

    public static function getStatus($statut)
    {
        if ($statut==1) {
            return 'Section';
        }else {
            return 'Sous-section';
        }
    }
    /**
     * Get the value of db
     */
    public static function getDb()
    {
        $dbname = 'akoybizc_aemn';
        $user = 'akoybizc_attaher';
        $pass = '@aemn2019';
        if ($_SERVER["SERVER_NAME"] == 'localhost') {
            $dbname = 'aemn';
            $user = 'root';
            $pass = '';
        }
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "$user", "$pass", $pdo_options);
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
        return $bdd;
    }
}
    