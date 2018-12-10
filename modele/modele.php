<?php

abstract class Modele {
    
    private $bdd;
    
    private function getBdd() {
        if ($this->bdd == null) {
            $this->bdd = new PDO('mysql:host=localhost;dbname=test_mvc_poo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); ;
        }
        return $this->bdd;
    }
    
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->bindValue('params', $params);
            $resultat->execute();
        }
        return $resultat;
    }
}
