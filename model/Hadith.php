<?php

class Hadith extends Manager
{
    public function getHadith(){
        $sql = "SELECT id, titre, leHadith, rapporteur, h_img FROM hadith";
        $req = $this->bdd()->query($sql);
        if ($result = $req->fetchAll()) {
            return $result;
        }
    }
}