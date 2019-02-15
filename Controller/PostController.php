<?php

class PostController {
    
    private $postManager;
    private $commentManager;
    
    public function __construct() 
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }
    
    public function post() 
    {
        $post = $this->postManager->find($_REQUEST['id']);
        $comments = $this->commentManager->findAll($_REQUEST['id']);
        $view = new View("Post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
    
    public function posts()
    {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $totalPosts = $this->postManager->rowsNumber('post');
        $totalPages = ceil($totalPosts/$limit);
        $posts = $this->postManager->findAll($limit, $offset);
        $view = new View('Posts');
        $view->generate(array('posts' => $posts, 'page' => $page, 'totalPages' => $totalPages));
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
        $table = 'post';
        $totalPosts = $this->postManager->rowsNumber($table);
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
    
    public function postForm() {
        
        $post = $this->postManager->find($_REQUEST['id']);
        $view = new View("AdminUpdate");
        $view->generate(array('post' => $post));
    }
    
    public function addPostValidation() 
    {
        $post = new Post();
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $_REQUEST['image'] = Validator::validatePostImage($_FILES['image']);
        } else {
            $_REQUEST['image'] = 'default.jpg';
        }
        $post->hydrate($_REQUEST);
        $this->postManager->add($post);
        header("location: ?action=adminPosts");
        exit();
    }
    
    public function updatePostValidation() 
    {
        $post = $this->postManager->find($_REQUEST['id']);
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {      
            $_REQUEST['image'] = Validator::validatePostImage($_FILES['image']);
        }
        $post->hydrate($_REQUEST);
        $this->postManager->update($post);
        header("Location: ?action=adminPosts");
        exit();     
    }        
    
    public function deletePost()
    {
        $post = $this->postManager->find($_REQUEST['id']);
        $this->postManager->delete($post);
        header("Location: ?action=adminPosts");
        exit();
    }
}