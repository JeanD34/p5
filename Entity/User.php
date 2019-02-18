<?php

class User 
{
    use HydratorTrait;
    private $id;
    private $username;
    private $email;
    private $password;
    private $website;
    private $avatar;
    private $description;
    private $inscription_date;
    private $confirmation_token;
    
    // Setters
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setWebsite($website)
    {
        $this->website = $website;
    }
    
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setInscription_date($inscription_date)
    {
        $this->inscription_date = $inscription_date;
    }
    
    public function setConfirmation_token($confirmation_token)
    {
        $this->confirmation_token = $confirmation_token;
    }
    
    // Getters
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getWebsite()
    {
        return $this->website;
    }
    
    public function getAvatar()
    {
        return $this->avatar;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getInscription_date()
    {
        return $this->inscription_date;
    }
    
    public function getConfirmation_token()
    {
        return $this->confirmation_token;
    }
    
    
}