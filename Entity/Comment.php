<?php

class Comment 
{
    use HydratorTrait;
    private $id;
    private $content;
    
    // Setters
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
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

    
}