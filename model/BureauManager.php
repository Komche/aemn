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


   

    public function verifUser($nom_bureau, $logo, $status)
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

    public function addUser()
    {
        $length = 12;
        global $token;
        $token = bin2hex(random_bytes($length));
        $sql = "INSERT INTO users(last_name, first_name, email, phone_number, code)
            SELECT * FROM(SELECT :last_name, :first_name, :email, :phone_number, :code) as tmp
            WHERE NOT EXISTS(
            SELECT email FROM users WHERE email = :email) LIMIT 1";
            $user = $this->bdd()->prepare($sql);
            if($user->execute(array(
                'last_name' => $this->last_name,
                'first_name' => $this->first_name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'code' => $token,
            ))){
                return 1;
            }else{
                global $erreur;
                return $erreur = 'Une erreur s\'est produite, l\'utilisateur existe dèjà !';
            }
    }

    public function updateUser($id)
    {
        $sql = "UPDATE users SET last_name=:last_name, first_name=:first_name, email=:email, phone_number=:phone_number
         WHERE id_user=:id";

        $user = $this->bdd()->prepare($sql);
        $user->execute(array(
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'id' => $id
        ));
        return 1;
    }

    public function verifPassword($password1, $password2)
    {
        if (strlen($password1) < 8 or strlen($password1) > 20) {
            return $erreur = "Désolé le mot de passe doit avoir au moins 8 caractères et au plus 20 caractères !";
        } else {
            if ($password1 == $password2) {
                return 'ok';
            } else {
                return "Le mot de passe est différent du mot de passe de confirmation !";
            }


        }
    }

    public function createAccount($code, $password)
    {
        $sql = "SELECT code FROM users WHERE code=:code";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('code' => $code));

        if ($res = $req->fetch()) {
            $sql = "UPDATE users SET password_user=:password_ WHERE code=:code";

            $req = $this->bdd()->prepare($sql);
            if ($req->execute(array(
                'password_' => $password,
                'code' => $code
            ))) {
                return 'ok';
            } else {
                return 'Une erreure s\'est produite';
            }
        } else {
            return 'Ce code est invalide, vérifier et puis réessayer';
        }

        return 1;
    }

    public function connectUser()
    {
        $db = $this->getDb();
        $sql = 'SELECT * FROM users WHERE email = :email ';
        $user = $db->prepare($sql);
        $user->execute(array('email' => $this->email));
        $result = $user->fetch();

        if ($result) {
            if ($this->mdp == $result['password_user']) {
                return 'ok';
            } else {
                return $erreur = 'Le mot de passe est incorrecte !';
            }

        } else {
            $erreur = 'L\'adresse email n\'existe pas';
            return $erreur;
        }
    }

    public function getUserToUpdate($user)
    {
        $sql="SELECT * FROM users WHERE id_user=:user";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('user'=>$user));

        if ($result= $req->fetch()){

            return $result;
        }
    }

    public function sessionUser()
    {
        $db = $this->getDb();
        $sql = 'SELECT u.id_user, u.last_name, u.first_name, u.email, u.phone_number, r.types, r.read_role, 
        r.write_role, r.id_roles FROM users u LEFT JOIN roles r ON u.id_user = r.user WHERE email = :email ';
        $session = $db->prepare($sql);
        $session->execute(array('email' => $this->email));

        if ($result = $session->fetch()) {
            $_SESSION['id'] = $result['id_user'];
            $_SESSION['last_name'] = $result['last_name'];
            $_SESSION['first_name'] = $result['first_name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['phone_number'] = $result['phone_number'];
            $_SESSION['types'] = $result['types'];
            $_SESSION['read_role'] = $result['read_role'];
            $_SESSION['write_role'] = $result['write_role'];

            return 1;
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
    