<?php

class Annonce extends Manager
{
    public function getAnnonce(){
        $sql = "SELECT id, titre, date, heure, h_annonce FROM annonce";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }

    public function lastAnnonce($id){
    $sql = "SELECT id, titre, date, heure, h_annonce FROM annonce where id >'$id'";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }
}