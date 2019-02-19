<?php

class Router 
{  
    private $homeController;
    private $postController;
    private $userController;
    private $commentController;
    
    public function __construct() 
    {
        $this->homeController = new HomeController();
        $this->postController = new PostController();
        $this->userController = new UserController();
        $this->commentController = new CommentController();
    }
    
    public function queryRouting() 
    {
        try {
            if (isset($_REQUEST['action'])) {
                $loggedAction = array('comment','validateComment', 'editCommentView', 'editComment', 'deleteComment', 'adminComments', 'profile', 'userTable', 'deleteUser', 'logout', 'admin', 'adminPosts', 'deletePost', 'updateView', 'updatePost', 'addPostView', 'addPost');
                $loggedAdminAction = array('validateComment', 'adminComments', 'admin', 'adminPosts', 'deletePost','updateView', 'updatePost', 'addPostView', 'addPost', 'userTable', 'deleteUser');
                if (in_array($_REQUEST['action'], $loggedAction)) {
                    if (!Validator::validateUser()) {
                        throw new LoginException('Veuillez vous connecter pour effectuer cette action');
                    }
                }
                if (in_array($_REQUEST['action'], $loggedAdminAction)) {
                    if (!Validator::validateAdmin()) {
                        throw new LoginException('Vous ne disposez pas des droits pour effectuer cette action');
                    }
                }
               switch ($_REQUEST['action']) {
                    case 'post':
                        if(isset($_REQUEST['id'])) {  
                            $this->postController->post();
                        } else {
                            throw new Exception('Numéro article inexistant');
                        }
                        break;
                    case 'posts':
                        $this->postController->posts();
                        break;
                    case 'comment':                      
                        $this->commentController->comment();
                        break;
                    case 'contactMail':                      
                        $this->homeController->contactMail();
                        break;
                    case 'validateComment':
                        $this->commentController->validateComment();
                        break;
                    case 'editCommentView':
                        $this->commentController->updateCommentView();
                        break;
                    case 'editComment':
                        $this->commentController->updateComment();
                        break;
                    case 'deleteComment':
                        $this->commentController->deleteComment();
                        break;
                    case 'adminComments':
                        $this->commentController->adminComments();
                        break;
                    case 'userComments':
                        $this->userController->userComments();
                        break;
                    case 'loginView':
                        $this->userController->loginView();
                        break;
                    case 'login':
                        $this->userController->login();
                        break;
                    case 'updateAccount':
                        $this->userController->updateAccount();
                        break;
                    case 'profile':
                        $this->userController->profile();
                        break;
                    case 'userProfile':
                        $this->userController->userProfile();
                        break;
                    case 'userTable':
                        $this->userController->userTable();
                        break;
                    case 'deleteUser':
                        $this->userController->deleteUser();
                        break;
                    case 'logout':
                        $this->userController->logout();
                        break;
                    case 'confirmUser':
                        $this->userController->confirmationUser();
                        break;
                    case 'addUser':
                        $this->userController->addUser();
                        break;
                    case 'admin':
                        $this->postController->admin();
                        break;
                    case 'adminPosts':
                        $this->postController->adminPosts();
                        break;
                    case 'deletePost':
                        $this->postController->deletePost();
                        break;
                    case 'updateView':
                        $this->postController->postForm();
                        break;
                    case 'updatePost':
                        $this->postController->updatePostValidation();
                        break;          
                    case 'addPostView':
                        $this->postController->addView();
                        break;
                    case 'addPost':                       
                        $this->postController->addPostValidation();
                        break; 
                    default:
                        throw new Exception('Action invalide');
                        break;
                } 
            } else {
                $this->homeController->home();
            }
        } catch (MailException $e) {
            $this->homeController->errorMail($e->getMessage());
        } catch (LoginException $e) {
            $this->userController->errorConnecting($e->getMessage());            
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
