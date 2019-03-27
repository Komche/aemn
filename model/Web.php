<?php


class Web extends Manager
{
    public function listeActivite(){
        $sql = " SELECT * FROM type_article";

        $req = $this->bdd()->query($sql);

        if ($res = $req->fetchAll()) {
            return $res;
        }
    }
}