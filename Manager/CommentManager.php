<?php

class CommentManager extends AbstractManager
{
    public function findAll($postId)
    {
        $comments = [];
        $sql = 'SELECT * FROM comment WHERE id_post_fk = ? AND validated = 1';
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
    
    public function findAllValidate() 
    {
        $comments = [];
        $sql = 'SELECT * FROM comment WHERE validated = 1 ORDER BY id DESC';
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
    
    public function findAllInvalidate()
    {
        $comments = [];
        $sql = 'SELECT * FROM comment WHERE validated = 0 ORDER BY id DESC';
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
    
    public function find($commentId)
    {
        $sql = 'SELECT * FROM comment WHERE id = ?';
        $result = $this->queryExecute($sql, array($commentId));
        
        if ($result->rowCount() == 1) {
            $row = $result->fetch();
            $comment = new Comment();
            $comment->hydrate($row);
            return $comment;
            
        } else {
            throw new Exception('Le commentaire numéro ' . $commentId . ' n\'existe pas.');
        }
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
    
    public function findLastUserComment($id) {
        $userComments = [];
        $sql = 'SELECT * FROM comment WHERE validated = 1 AND id_user_fk = ? LIMIT 3';
        $result = $this->queryExecute($sql, array($id));
        if ($result->rowCount() >= 1) {
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $userComments[] = $comment;
            }
        }
        
        return $userComments;
    }
    
    public function add($comment) 
    {
        $sql ='INSERT INTO comment (content, id_post_fk, id_user_fk) VALUES (?, ?, ?)';
        $this->queryExecute($sql, array($comment->getContent(), $comment->getId_post_fk(), $comment->getId_user_fk()));
    }
    
    public function validate($comment) {
        
        $sql = 'UPDATE comment SET validated = 1 WHERE id = ?';
        $this->queryExecute($sql, array($comment->getId()));
    }
    
    public function update($comment)
    {
        $sql ='UPDATE comment SET content = ? WHERE id = ?';
        $this->queryExecute($sql, array($comment->getContent(), $comment->getId()));
    }
    
    public function delete($comment)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->queryExecute($sql, array($comment->getId()));
    }
}