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
        $sql = "SELECT nom_bureau, logo FROM bureau";
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
        $sql = " SELECT COUNT(*) AS be FROM bureau where statut=1";
        $req = $this->bdd()->query($sql);
        if ($res = $req->fetch()) {
            return $res['be'];
        }
    }

    public function nbSsection()
    {
        $sql = " SELECT COUNT(*) AS be FROM bureau where statut=2";
        $req = $this->bdd()->query($sql);
        if ($res = $req->fetch()) {
            return $res['be'];
        }
    }


}