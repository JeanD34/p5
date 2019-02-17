<?php

Class PostManager extends AbstractManager
{      
    public function findAll($limit, $offset)
    {
        $posts = [];
        $sql = 'SELECT post.id, title, image, lead, content, add_date, id_user_fk, username, avatar FROM post JOIN user ON post.id_user_fk = user.id ORDER BY post.id DESC LIMIT :limit OFFSET :offset';
        $result = $this->queryExecuteInt($sql, array('limit' => $limit, 'offset' => $offset));
        foreach ($result->fetchAll() as $row) {
            $post = new Post();
            $post->hydrate($row);
            $posts[] = $post;
        }
  
        return $posts;
    }
    
    public function find($postId)
    {
        $sql = 'SELECT * FROM post WHERE id = ?';
        $result = $this->queryExecute($sql, array($postId));
        
        if ($result->rowCount() == 1) {
            $row = $result->fetch();
            $post = new Post();
            $post->hydrate($row);
            return $post;

        } else {
            throw new Exception('L\'article numéro ' . $postId . ' n\'existe pas.');
        }
    }
    
    public function findLast()
    {
        $sql = 'SELECT post.id, title, image, lead, id_user_fk, add_date, username, avatar FROM post JOIN user ON post.id_user_fk = user.id ORDER BY post.id DESC LIMIT 3';
        $result = $this->queryExecute($sql);
        foreach ($result->fetchAll() as $row) {
            $post = new Post();
            $post->hydrate($row);
            $posts[] = $post;
        }
        
        return $posts;
    }
    
    public function findLastFour()
    {
        $sql = 'SELECT post.id, title, image, lead, id_user_fk, add_date, username, avatar FROM post JOIN user ON post.id_user_fk = user.id ORDER BY post.id DESC LIMIT 4';
        $result = $this->queryExecute($sql);
        foreach ($result->fetchAll() as $row) {
            $post = new Post();
            $post->hydrate($row);
            $posts[] = $post;
        }
        
        return $posts;
    }
    
    public function add($post)
    {
        $sql = 'INSERT INTO post (title, lead, image, content, add_date, id_user_fk) values (?, ?, ?, ?, NOW(), ?)';
        $this->queryExecute($sql, array($post->getTitle(), $post->getLead(), $post->getImage(), $post->getContent(), $post->getId_user_fk()));
                     
    }
    
    public function update(Post $post) {
        $sql = 'UPDATE post SET title = ?, lead = ?, image = ?, content= ? WHERE id = ?';
        $this->queryExecute($sql, array($post->getTitle(), $post->getLead(), $post->getImage(), $post->getContent(), $post->getId())); 
    }
    
    
    public function delete($post)
    {
        $sql = 'DELETE FROM post WHERE id = ?';
        $this->queryExecute($sql, array($post->getId()));
    }
}