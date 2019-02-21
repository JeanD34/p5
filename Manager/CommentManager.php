<?php

class CommentManager extends AbstractManager
{
    public function findAll($postId)
    {
        $comments = [];
        $sql = 'SELECT comment.id, content, add_date, id_user_fk, username, avatar FROM comment JOIN user ON comment.id_user_fk = user.id WHERE id_post_fk = ? AND validated = 1';
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
    
    public function findAllValidate($limit, $offset) 
    {
        $comments = [];
        $sql = 'SELECT comment.id, comment.content, comment.add_date, comment.id_user_fk, comment.id_post_fk, username, avatar, post.title FROM comment JOIN user ON comment.id_user_fk = user.id JOIN post ON comment.id_post_fk = post.id WHERE validated = 1 ORDER BY id DESC LIMIT :limit OFFSET :offset';
        $result = $this->queryExecuteInt($sql, array('limit' => $limit, 'offset' => $offset));
        if ($result->rowCount() >= 1) {
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $comments[] = $comment;
            }
        }
        
        return $comments;
    }
    
    public function findAllInvalidate($limit, $offset)
    {
        $comments = [];
        $sql = 'SELECT comment.id, comment.content, comment.add_date, comment.id_user_fk, comment.id_post_fk, username, avatar, post.title FROM comment JOIN user ON comment.id_user_fk = user.id JOIN post ON comment.id_post_fk = post.id WHERE validated = 0 ORDER BY id DESC LIMIT :limit OFFSET :offset';
        $result = $this->queryExecuteInt($sql, array('limit' => $limit, 'offset' => $offset));
        if ($result->rowCount() >= 1) {
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $comments[] = $comment;
            }
        }
        
        return $comments;
    }

    public function commentNumber($valid)
    {
        $sql = 'SELECT COUNT(*) FROM comment WHERE validated = ?';
        $result = $this->queryExecute($sql, array($valid));
        $count = $result->fetch();
        return $count[0];
    }

    public function commentUserNumber($id)
    {
        $sql = 'SELECT COUNT(*) FROM comment WHERE validated = 1 AND id_user_fk = ?';
        $result = $this->queryExecute($sql, array($id));
        $count = $result->fetch();
        return $count[0];
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
            throw new Exception('Ce commentaite n\'existe pas');
        }
    }

    public function findAllUserComments($userId)
    {
        $userComments = [];
        $sql = 'SELECT comment.id, comment.content, comment.add_date, comment.id_user_fk, comment.id_post_fk, username, avatar, post.title FROM comment JOIN user ON comment.id_user_fk = user.id JOIN post ON comment.id_post_fk = post.id WHERE validated = 1 AND comment.id_user_fk = ? ORDER BY comment.id DESC';
        $result = $this->queryExecute($sql, array($userId));
        if ($result->rowCount() >= 1) {
            foreach ($result->fetchAll() as $row) {
                $comment = new Comment();
                $comment->hydrate($row);
                $userComments[] = $comment;
            }
        }
        
        return $userComments;
    }
    
    public function findLastThree() 
    {   
        $comments = [];
        $sql = 'SELECT comment.id, comment.content, comment.add_date, comment.id_user_fk, comment.id_post_fk, username, avatar, post.title FROM comment JOIN user ON comment.id_user_fk = user.id JOIN post ON comment.id_post_fk = post.id WHERE validated = 0 ORDER BY comment.id DESC LIMIT 3';
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
        $sql = 'SELECT comment.id, comment.content, comment.add_date, comment.id_user_fk, comment.id_post_fk, username, avatar, post.title FROM comment JOIN user ON comment.id_user_fk = user.id JOIN post ON comment.id_post_fk = post.id WHERE validated = 1 AND comment.id_user_fk = ? ORDER BY comment.id DESC LIMIT 3';
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

    public function countPostComments($id) {
        $sql = 'SELECT COUNT(*) FROM comment WHERE id_post_fk = ? AND validated = 1';
        $result = $this->queryExecute($sql, array($id));
        $count = $result->fetch();
        return $count[0];
    }
    
    public function add($comment) 
    {
        $sql ='INSERT INTO comment (content, id_post_fk, add_date, id_user_fk) VALUES (?, ?, NOW(), ?)';
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

    public function userUpdate($comment)
    {
        $sql ='UPDATE comment SET content = ?, validated = 0 WHERE id = ?';
        $this->queryExecute($sql, array($comment->getContent(), $comment->getId()));
    }
    
    public function delete($comment)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->queryExecute($sql, array($comment->getId()));
    }
}