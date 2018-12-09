<?php

function getBdd() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test_mvc_poo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e){
        $msgErreur = $e->getMessage();
        require 'vueErreur.php';
    }  
    return $bdd;
}

function getArticles() {
    $bdd = getBdd();
    $articles = $bdd->query('SELECT * FROM article');
    return $articles;
}