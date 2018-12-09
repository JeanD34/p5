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

function getArticle($idArticle) {
    $bdd = getBdd();
    $article = $bdd->prepare('SELECT * FROM article where id = :id');
    $article->bindValue('id', $idArticle);
    $article->execute();
    
    if ($article->rowCount() == 1) {
        return $article->fetch();
    } else {
        throw new Exception('L\'article numéro ' . $idArticle . ' n\'existe pas.');
    }
    
}