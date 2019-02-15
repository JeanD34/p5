<?php

class Comment 
{
    use HydratorTrait;
    private $id;
    private $content;
    private $id_post_fk;
    private $id_user_fk;
    
    // Setters
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function setId_post_fk($id_post_fk)
    {
        $this->id_post_fk = $id_post_fk;
    }
    
    public function setId_user_fk($id_user_fk)
    {
        $this->id_user_fk = $id_user_fk;
    }
    
    // Getters
    
    public function getId()
    {
        return $this->id;   
    }
    
    public function getContent()
    {
        return $this->content;
    } 
    
    public function getId_post_fk()
    {
        return $this->id_post_fk;
    }
    
    public function getId_user_fk()
    {
        return $this->id_user_fk;
    }
}