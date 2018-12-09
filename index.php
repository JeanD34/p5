<?php

require 'controleur/controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'article') {
            if(isset($_GET['id'])) {
                article($_GET['id']);
            } else {
                throw new Exception('Numéro article inexistant');
            }
        } else {
            throw new Exception('Action invalide');
        }
    } else {
        accueil();
    }
    
} catch (Exception $e) {
    erreur($e->getMessage());
}
?>



