<?php

class Bureau extends Manager
{
    public function getBE(){
        $sql = "SELECT * FROM bureau";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }

    public function getLogo(){
        $sql = "SELECT libelleBureau nom_bureau, file_ur logo FROM bureau b, files f WHERE b.photo=f.id";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }

    public function nbBE()
    {
        $sql = " SELECT COUNT(*) AS be FROM bureau";
        $req = $this->bdd()->query($sql);
        if ($res = $req->fetch()) {
            return $res['be'];
        }
    }

    public function nbSection()
    {
        $sql = " SELECT COUNT(*) AS be FROM bureau where typeBureau='Section'";
        $req = $this->bdd()->query($sql);
        if ($res = $req->fetch()) {
            return $res['be'];
        }
    }

    public function nbSsection()
    {
        $sql = " SELECT COUNT(*) AS be FROM bureau where typeBureau='Sous section'";
        $req = $this->bdd()->query($sql);
        if ($res = $req->fetch()) {
            return $res['be'];
        }
    }


}