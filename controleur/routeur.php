<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurArticle.php';
require_once 'vue/vue.php';

class Routeur {
    
    private $ctrlAccueil;
    private $ctrlArticle;
    
    public function __construct() {
        $this->ctrlAccueil = new controleurAccueil();
        $this->ctrlArticle = new controleurArticle();
    }
    
    public function routerRequete() {
    
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'article') {
                    if(isset($_GET['id'])) {
                        $this->ctrlArticle->article($_GET['id']);
                    } else {
                        throw new Exception('Numéro article inexistant');
                    }
                } else {
                    throw new Exception('Action invalide');
                }
            } else {
               $this->ctrlAccueil->accueil();
            }
            
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}


