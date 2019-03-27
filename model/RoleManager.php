<?php require_once("Manager.php");


class RoleManager extends Manager
{


    private $type;
    private $read_role;
    private $write_role;
    private $user;

    public function __construct($type, $read_role=null, $write_role=null,$user)
    {

        $this->type = $type;
        $this->read_role = $read_role;
        $this->write_role = $write_role;
        $this->user = $user;
    }

    public function addRole() {
        $sql = "INSERT INTO roles(types, read_role, write_role, user)
            VALUE(:types, :read_role, :write_role, :user)";

        $user = $this->bdd()->prepare($sql);
        $user->execute(array(
            'types'=>$this->type,
            'read_role'=>$this->read_role,
            'write_role'=>$this->write_role,
            'user'=>$this->user
        ));
        return 1;
    }

    public function editRole()
    {
        $sql = "UPDATE roles SET types=:types, read_role=:read_role, write_role=:write_role WHERE user=:id_user";
        $user = $this->bdd()->prepare($sql);
        $user->execute(array(
            'types'=>$this->type,
            'read_role'=>$this->read_role,
            'write_role'=>$this->write_role,
            'id_user'=>$this->user
        ));
        return 1;
    }

    public function getRole(){
        $sql = "SELECT * FROM roles";

        $req = $this->bdd()->query($sql);

        if ($rest = $req->fetchAll()) {

            return $rest;
        }
    }

    public function getDriverToUpdate($driver)
    {
        $sql = "SELECT * FROM driver WHERE id_driver=:driver";

        $req = $this->bdd()->prepare($sql);
        $req->execute(array('driver' => $driver));

        if ($result = $req->fetch()) {

            return $result;
        }
    }
}