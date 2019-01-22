<?php

class CommentManager extends AbstractManager
{
    public function findAll($postId)
    {
        $comments = [];
        $sql = 'SELECT * FROM comment where id_post_fk = ? AND validated = 1';
        $result = $this->queryExecute($sql, array($postId));
        if ($result->rowCount() >= 1) {        
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $comments[] = $comment;
            }
        }
        
        return $comments;
    }
    
    public function findLastThree() 
    {   
        $comments = [];
        $sql = 'SELECT * FROM comment WHERE validated = 0 LIMIT 3';
        $result = $this->queryExecute($sql);
        if ($result->rowCount() >= 1) {
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $comments[] = $comment;
            }
        }
        
        return $comments;
        
    }
    
    public function add($content, $postId) 
    {
        $sql ='INSERT INTO comment (content, id_post_fk) VALUES (?, ?)';
        $this->queryExecute($sql, array($content, $postId));
    }
    
    public function validate($commentId) {
        
        $sql = 'UPDATE comment SET validated = 1 WHERE id = ?';
        $this->queryExecute($sql, array($commentId));
    }
    
    public function delete($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->queryExecute($sql, array($commentId));
    }
}