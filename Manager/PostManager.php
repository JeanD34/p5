<?php

Class PostManager extends AbstractManager
{
    public function rowsNumber()
    {
        $sql = 'SELECT COUNT(*) FROM post';
        $result = $this->queryExecute($sql);
        $count = $result->fetch();        
        return $count[0];
    }
    
    public function findAll($limit, $offset)
    {
        $posts = [];
        $sql = 'SELECT * FROM post ORDER BY id DESC LIMIT :limit OFFSET :offset';
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
        $sql = 'SELECT id, title, image, lead FROM post ORDER BY id DESC LIMIT 3';
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
        $sql = 'SELECT id, title, image, lead FROM post ORDER BY id DESC LIMIT 4';
        $result = $this->queryExecute($sql);
        foreach ($result->fetchAll() as $row) {
            $post = new Post();
            $post->hydrate($row);
            $posts[] = $post;
        }
        
        return $posts;
    }
    
    public function add($title, $lead, $image, $content)
    {
        $sql = 'INSERT INTO post (title, lead, image, content) values (?, ?, ?, ?)';
        $this->queryExecute($sql, array($title, $lead, $image, $content));
                     
    }
    
    public function update($title, $lead, $image, $content, $postId) {
        $sql = 'UPDATE post SET title = ?, lead = ?, image = ?, content= ? WHERE id = ?';
        $this->queryExecute($sql, array($title, $lead, $image, $content, $postId));
    }
    
    public function updateNoImg($title, $lead, $content, $postId) {
        $sql = 'UPDATE post SET title = ?, lead = ?, content= ? WHERE id = ?';
        $this->queryExecute($sql, array($title, $lead, $content, $postId));
    }
    
    public function delete($postId)
    {
        $sql = 'DELETE FROM post WHERE id = ?';
        $this->queryExecute($sql, array($postId));
    }
}