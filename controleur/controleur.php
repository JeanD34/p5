<?php

require 'modele.php';

function accueil() {
    $articles = getArticles();
    require 'vueAccueil.php';
}

function article($idArticle) {
    $article = getArticle($idArticle);
    require 'vueArticle.php';
}

function erreur($msgErreur) {
    require 'vueErreur.php';
}