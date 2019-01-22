<?php

class Post  
{
    use HydratorTrait;
    private $id;
    private $title;
    private $image;
    private $lead;
    private $content;
    
    // Setters //
    
    public function setId($id) 
    {
        $this->id = $id;
    }
    
    public function setTitle($title) 
    {
        $this->title = $title;
    }
    
    public function setImage($image) 
    {
        $this->image = $image;
    }
    
    public function setLead($lead)
    {
        $this->lead = $lead;
    }
    
    public function setContent($content) 
    {
        $this->content = $content;
    }
           
    // Getters //
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return strtoupper($this->title);
    }
    
    public function getImage()
    {
        return $this->image;
    }
    
    public function getLead() 
    {
        return $this->lead;
    }
    
    public function getContent()
    {
        return $this->content;
    }
}