<?php
require_once 'modele/article.php';
require_once 'vue/vue.php';

class controleurArticle {
    
        private $article;
        private $commentaire;
        
        public function __construct() {
            $this->article = new article();
        }
        
        public function article($idArticle) {
            $article = $this->article->getArticle($idArticle);
            $vue = new vue("Article");
            $vue->generer(array('article' => $article));
        }
    
}