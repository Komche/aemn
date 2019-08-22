<?php
class Manager
{

    protected $last_name;
    protected $first_name;
    protected $email;
    protected $phone_number;


    protected function bdd()
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

    protected function insert($last_name, $first_name, $email, $phone_number, $table, $code = null, $company_name = null, $type = null, $nif = null, $rccm = null, $licence = null, $licence_number = null)
    {
        $db = $this->bdd();
        if ($code != null) {
            $sql = "INSERT INTO $table(last_name, first_name, email, phone_number, code)
            VALUE(:last_name, :first_name, :email, :phone_number, :code)";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'code' => $code,
            ));
        } elseif (($company_name != null) || ($type != null) || ($nif != null) || ($rccm != null)) {
            $sql = "INSERT INTO $table(last_name, frist_name, email, phone_number, company_name,	types, nif, rccm, id_user)
            VALUE(:last_name, :first_name, :email, :phone_number, :company_name, :types, :nif, :rccm, :id)";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'company_name' => $company_name,
                'types' => $type,
                'nif' => $nif,
                'rccm' => $rccm,
                'id' => $_SESSION['id']
            ));
        } elseif (($licence != null) || ($licence_number != null)) {
            $sql = "INSERT INTO $table(last_name, first_name, email, phone_number, licence, licence_number)
            VALUE(:last_name, :first_name, :email, :phone_number, :licence, :licence_number)";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'licence' => $licence,
                'licence_number' => $licence_number
            ));
        }

        return 1;
    }

    public function editUser($last_name, $first_name, $email, $phone_number, $table, $id, $mdp = null, $company_name = null, $type = null, $nif = null, $rccm = null, $licence = null, $licence_number = null)
    {
        $db = $this->bdd();
        if ($mdp != null) {
            $sql = "INSERT INTO $table(last_name, first_name, email, phone_number, password_user)
            VALUE(:last_name, :first_name, :email, :phone_number, :mdp)";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'mdp' => $mdp,
            ));
        } elseif (($company_name != null) || ($type != null) || ($nif != null) || ($rccm != null)) {
            echo 'ok';
            $sql = "UPDATE $table SET last_name=:last_name, frist_name=:frist_name, email=:email, phone_number=:phone_number,
                        company_name=:company_name, types=:types, nif=:nif, rccm=:rccm WHERE id_customer=:id";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'frist_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'company_name' => $company_name,
                'types' => $type,
                'nif' => $nif,
                'rccm' => $rccm,
                'id' => $id
            ));
            return 1;
        } elseif (($licence != null) || ($licence_number != null)) {
            $sql = "UPDATE $table SET last_name=:last_name, first_name=:first_name, email=:email, phone_number=:phone_number, licence=:licence, licence_number=:licence_number WHERE id_driver=:id";

            $user = $db->prepare($sql);
            $user->execute(array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'id' => $id,
                'licence' => $licence,
                'licence_number' => $licence_number
            ));
        }

        return 1;
    }

    protected function verif($last_name, $first_name, $email, $phone_number, $code = null)
    {
        if ($code != null) {
            if (strlen($last_name) >= 3 && strlen($first_name) >= 3) {

                $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                if (preg_match($syntaxe, $email)) {
                    if (strlen($phone_number) >= 8) {
                        return 'ok';
                    } else {
                        return $erreur = "Le numéro de téléphone doit avoir au moins 8 chiffres";
                    }

                } else {
                    return $erreur = "Votre email n\'est pas au bon format";
                }


            } else {
                return $erreur = "Le nom et le prénom doivent avoir au moins trois(3) caractères";
            }
        } else {
            if (strlen($last_name) >= 3 && strlen($first_name) >= 3) {

                $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                if (preg_match($syntaxe, $email)) {
                    if (strlen($phone_number) >= 8) {
                        return 'ok';
                    } else {
                        return $erreur = "Le numéro de téléphone doit avoir au moins 8 chiffres";
                    }

                } else {
                    return $erreur = "Votre email n\'est pas au bon format";
                }


            } else {
                return $erreur = "Le nom et le prénom doivent avoir au moins trois(3) caractères";
            }
        }
    }


    public function editVehicle($id)
    {
        $sql = "UPDATE vehicle SET available=0 WHERE  id_vehicle=:id";

        $user = $this->bdd()->prepare($sql);
        $user->execute(array(
            'id' => $id
        ));
        return 1;
    }

    public function nbAvailable($table)
    {
        $sql = " SELECT COUNT(*) AS nb FROM $table WHERE available=0";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetch()) {
            return $res['nb'];
        }
    }

    public function isAvailable($table, $id)
    {
        $champ = "id" . "_" . $table;
        $sql = " SELECT available FROM $table WHERE $champ=:id";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('id' => $id));

        if ($res = $req->fetch()) {
            return $res['available'];

        }
    }

    public static function is_not_empty($fields = [], $not_required = [null])
    {
        if (count($fields) != 0) {
            foreach ($fields as $key => $field) {
                if (empty($field) && trim($field) == "") {
                    if (count($not_required) != 0) {
                        foreach ($not_required as $nkey => $nvalue) {
                            if ($key != $nkey) {
                                return "$key est vide";
                            }
                        }
                    } else {
                        return "$key est vide";
                    }
                }
            }
            return 1;
        }
    }

    public function error($error)
    {
        echo '<div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
        <strong>Erreur: </strong>' . $error .
            '</div>';
    }
}
    
