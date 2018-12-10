<?php
 
require_once 'modele/article.php';
require_once 'vue/vue.php';

class controleurAccueil {
    private $article;
    
    public function __construct() {
        $this->article = new article();
    }
    
    public function accueil() {
        $articles = $this->article->getArticles();
        $vue = new vue('Accueil');
        $vue->generer(array('articles' => $articles));
    }
}