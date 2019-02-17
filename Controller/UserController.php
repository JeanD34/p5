<?php

class UserController
{
    
    private $userManager;
    private $commentManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->commentManager = new CommentManager();
    }
    
    public function loginView() 
    {
        $view = new View("Login");
        $view->generate(array());
    }
    
    public function login()
    {        
        $user = $this->userManager->log($_REQUEST['username']);
        if(password_verify($_REQUEST['password'], $user['password'])) {
            $_SESSION['auth'] = $user;
            if ($user['role'] === 'user') {
                $this->profile();
            } else {
                header("Location: ?action=admin");
                exit();
            }
            
        } else {
            throw new Exception('Identifiants incorrects');
        }
    }
    
    public function addUser() 
    {
        $_REQUEST['password'] = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $_REQUEST['confirmation_token'] = bin2hex(random_bytes(64));
        $user = new User();
        $user->hydrate($_REQUEST);
        $this->userManager->add($user);
        $user_id = $this->userManager->lastId();
        $token = $_REQUEST['confirmation_token'];
        $subject = 'Confirmation creation compte';
        $content = "Pour confirmer votre compte veuillez cliquer sur ce lien " . CONFIRM_MAIL_LINK . "index.php?action=confirmUser&id=$user_id&token=$token";
        mail($_REQUEST['email'], $subject, $content);
        $validMsg = "Votre compte a bien été crée, un mail vous a été envoyé pour le confirmer";
        $view = new View("Login");
        $view->generate(array('validMsg' => $validMsg));

    }
    
    public function confirmationUser()
    {
        $user = $this->userManager->findToken($_REQUEST['id']);
        if ($user && $user['confirmation_token'] == $_REQUEST['token']) {
            $this->userManager->activation($_REQUEST['id']);
            $_SESSION['auth'] = $user;
            $this->profile();
            
        } else {
            throw new Exception('Action invalide');
        }
    }
    
    public function profile() 
    {   
        $user = $this->userManager->find($_SESSION['auth']['id']);
        $userComments = $this->commentManager->findLastUserComment($user->getId());
        $view = new View("AdminUser");
        $view->generate(array('user' => $user, 'userComments' => $userComments));
    }

    public function userComments()
    {
        $user = $this->userManager->find($_SESSION['auth']['id']);
        $userComments = $this->commentManager->findAllUserComments($user->getId());
        $view = new View("AdminUserComments");
        $view->generate(array('user' => $user, 'userComments' => $userComments));
    }

    public function updateAccount()
    {
        $user = $this->userManager->find($_SESSION['auth']['id']);
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {      
            $_REQUEST['avatar'] = Validator::validateAvatar($_FILES['avatar']);
        }
        if (empty($_REQUEST['password'])) {
            $_REQUEST['password'] = $user->getPassword();
        } else {
            $_REQUEST['password'] = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        }
        $user->hydrate($_REQUEST);
        $this->userManager->update($user);
        header("Location: ?action=profile");
        exit();
    }
    
    public function errorConnecting($error) 
    {
        $view = new View("Login");
        $view->generate(array('error' => $error));
    }
    
    public function logout() 
    {
        unset($_SESSION['auth']);
        header("Location: index.php");
        exit();
    }
}