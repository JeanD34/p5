<?php

class Post  
{
    use HydratorTrait;
    private $id;
    private $title;
    private $image;
    private $lead;
    private $content;
    private $add_date;
    private $id_user_fk;
    private $username;
    private $avatar;
    
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

    public function setAdd_date($add_date) 
    {
        $this->add_date = $add_date;
    }

    public function setId_user_fk($id_user_fk)
    {
        $this->id_user_fk = $id_user_fk;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function setUsername($username)
    {
        $this->username = $username;
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

    public function getAdd_date() {
        
        return $this->add_date;
    }

    public function getId_user_fk()
    {
        return $this->id_user_fk;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getUsername()
    {
        return $this->username;
    }
}