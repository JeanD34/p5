<?php

require_once 'modele/modele.php';

class Article extends Modele {
    
    public function getArticles() {
        $sql = 'SELECT * FROM article';
        $articles = $this->executerRequete($sql);
        return $articles;
    }
    
    public function getArticle($idArticle) {
       $sql = 'SELECT * FROM article where id = :params';
       $article = $this->executerRequete($sql, $idArticle);
        
        if ($article->rowCount() == 1) {
            return $article->fetch();
        } else {
            throw new Exception('L\'article numéro ' . $idArticle . ' n\'existe pas.');
        }       
    }   
}