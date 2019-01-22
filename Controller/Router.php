<?php

class Router 
{  
    private $homeController;
    private $postController;
    private $userController;
    
    public function __construct() 
    {
        $this->homeController = new HomeController();
        $this->postController = new PostController();
        $this->userController = new UserController();
        
    }
    
    public function queryRouting() 
    {
        try {
            if (isset($_GET['action'])) {
               switch ($_GET['action']) {
                    case 'post':
                        if(isset($_GET['id'])) {  
                            $this->postController->post($_GET['id']);
                        } else {
                            throw new Exception('Numéro article inexistant');
                        }
                        break;
                    case 'posts':
                        $this->postController->posts();
                        break;
                    case 'comment':
                        //Validator::validateComment($_POST);
                        $this->postController->comment($_POST['content'], $_POST['id']);
                        break;
                    case 'validateComment':
                        $this->postController->validateComment($_POST['id']);
                        break;
                    case 'deleteComment':
                        $this->postController->deleteComment($_POST['id']);
                        break;
                    case 'loginView':
                        $this->userController->loginView();
                        break;
                    case 'login':
                        $this->userController->login($_POST['current-username'], $_POST['current-password']);
                        break;
                    case 'profile':
                        $this->userController->profile();
                        break;
                    case 'logout':
                        $this->userController->logout();
                        break;
                    case 'confirmUser':
                        $this->userController->confirmationUser($_GET['id'], $_GET['token']);
                        break;
                    case 'addUser':
                        $this->userController->addUser($_POST['username'], $_POST['email'], $_POST['password']);
                        break;
                    case 'admin':
                        $this->postController->admin();
                        break;
                    case 'adminPosts':
                        $this->postController->adminPosts();
                        break;
                    case 'deletePost':
                        $this->postController->deletePost($_POST['id']);
                        break;
                    case 'updateView':
                        $this->postController->postForm($_GET['id']);
                        break;
                    case 'updatePost':
                        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                            $image = Validator::validatePostImage($_FILES['image']);
                            $this->postController->updatePost($_POST['title'], $_POST['lead'], $image, $_POST['content'], $_POST['id']);
                        } else {
                            $this->postController->updatePostNoImg($_POST['title'], $_POST['lead'], $_POST['content'], $_POST['id']);
                        }                       
                        break;
                    case 'addPostView':
                        $this->postController->addView();
                        break;
                    case 'addPost':
                        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                            $image = Validator::validatePostImage($_FILES['image']);
                        } else {
                            $image = 'default.jpg';
                        }
                        $this->postController->addPost($_POST['title'], $_POST['lead'], $image, $_POST['content']);
                        break; 
                    default:
                        throw new Exception('Action invalide');
                        break;
                } 
            } else {
                $this->homeController->home();
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }    
    }

    private function error($errorMsg) 
    {
        $view = new View("Error");
        $view->generate(array('errorMsg' => $errorMsg));
    }
}
