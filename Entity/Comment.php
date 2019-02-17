<?php

class Comment 
{
    use HydratorTrait;
    private $id;
    private $content;
    private $add_date;
    private $username;
    private $avatar;
    private $id_post_fk;
    private $id_user_fk;
    private $title;
    
    // Setters
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setAdd_date($add_date) 
    {
        $this->add_date = $add_date;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function setId_post_fk($id_post_fk)
    {
        $this->id_post_fk = $id_post_fk;
    }
    
    public function setId_user_fk($id_user_fk)
    {
        $this->id_user_fk = $id_user_fk;
    }
    
    public function setTitle($title) 
    {
        $this->title = $title;
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
    
    public function getAdd_date() 
    {
        
        return $this->add_date;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
    
    public function getId_post_fk()
    {
        return $this->id_post_fk;
    }
    
    public function getId_user_fk()
    {
        return $this->id_user_fk;
    }

    public function getTitle()
    {
        return strtoupper($this->title);
    }
}