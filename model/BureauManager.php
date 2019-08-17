<?php
require_once("Manager.php");

class BureauManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->bdd();
    }

    public function getBureau()
    {
        $sql = "SELECT * FROM bureau";

        $req = $this->bdd()->query($sql);

        if ($result = $req->fetchAll()) {

            return $result;
        }
    }


   

    public function verifBureau($nom_bureau, $logo)
    {
        if (empty($nom_bureau)) {
            return "Le nom du bureau ne doit pas être vide";
        }

        if (strlen($nom_bureau)<3) {
            return "Ce nom est trop pétit";
        }

        if (empty($logo)) {
            return "Le logo n'a pas été renseigné";
        }
    }

    public function addBureau($nom_bureau, $logo, $statut, $url)
    {
        $myurl = $this->addImg($logo, $url);
        $sql = "INSERT INTO bureau(nom_bureau, logo, statut)
            VALUE(:nom_bureau, :logo, :statut)";
            $user = $this->bdd()->prepare($sql);
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

    public function updateBureau($id, $nom_bureau, $logo, $statut, $url)
    {
        $myurl = $this->addImg($logo, $url);
        $sql = "UPDATE bureau SET nom_bureau=:nom_bureau, logo=:logo, statut=:statut
         WHERE id_bureau=:id";

        $user = $this->bdd()->prepare($sql);
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
    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }
}
    