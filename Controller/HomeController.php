<?php

class HomeController 
{
    private $postManager;
    
    public function __construct() 
    {       
        $this->postManager = new PostManager();
    }
    
    public function home() 
    {
        $view = new View('Home');
        $posts = $this->postManager->findLast();
        $view->generate(array('posts' => $posts));
    }
}