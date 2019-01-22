<?php

class PostController {
    
    private $postManager;
    private $commentManager;
    
    public function __construct() 
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }
    
    public function post($postId) 
    {
        $post = $this->postManager->find($postId);
        $comments = $this->commentManager->findAll($postId);
        $view = new View("Post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
    
    public function posts()
    {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $totalPosts = $this->postManager->rowsNumber();
        $totalPages = ceil($totalPosts/$limit);
        $posts = $this->postManager->findAll($limit, $offset);
        $view = new View('Posts');
        $view->generate(array('posts' => $posts, 'page' => $page, 'totalPages' => $totalPages));
    }
    
    
    public function comment($content, $postId) 
    {
        
        $this->commentManager->add($content, $postId);
        //$this->post($postId);
        header("location: ?action=post&id=$postId");
        exit();
    }
    
    public function validateComment($commentId)
    {
        $this->commentManager->validate($commentId);
        header("Location: ?action=admin");
        exit();
    }
    
    public function deleteComment($commentId)
    {
        $this->commentManager->delete($commentId);
        header("Location: ?action=admin");
        exit();
    }
    
    public function admin() {
        
        $commentToValidate = $this->commentManager->findLastThree();
        $postList = $this->postManager->findLastFour();
        $view = new View('Admin');
        $view->generate(array('postList' => $postList, 'commentToValidate' => $commentToValidate));
    }
    
    public function adminPosts() {
        
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limit = 8;
        $offset = ($page - 1) * $limit;
        $totalPosts = $this->postManager->rowsNumber();
        $totalPages = ceil($totalPosts/$limit);
        $posts = $this->postManager->findAll($limit, $offset);
        $view = new View('AdminPosts');
        $view->generate(array('posts' => $posts, 'page' => $page, 'totalPages' => $totalPages));
    }
    
    public function addView()
    {
        $view = new View('AdminAddPost');
        $view->generate(array());
    }
    
    public function postForm($postId) {
        
        $post = $this->postManager->find($postId);
        $view = new View("AdminUpdate");
        $view->generate(array('post' => $post));
    }
    
    
    public function addPost($title, $lead, $image, $content)
    {
        $this->postManager->add($title, $lead, $image, $content);
        header("location: ?action=admin");
        exit();
    }
    
    public function updatePost($title, $lead, $image, $content, $postId)
    {
        $this->postManager->update($title, $lead, $image, $content, $postId);
        header("Location: ?action=post&id=$postId");
        exit();
    }
    
    public function updatePostNoImg($title, $lead, $content, $postId)
    {
        $this->postManager->updateNoImg($title, $lead, $content, $postId);
        header("Location: ?action=post&id=$postId");
        exit();
    }
    
    public function deletePost($postId)
    {
        $this->postManager->delete($postId);
        header("Location: ?action=admin");
        exit();
    }
}