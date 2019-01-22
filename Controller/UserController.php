<?php

class UserController
{
    
    private $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager();
    }
    
    public function loginView() 
    {
        $view = new View("Login");
        $view->generate(array());
    }
    
    public function login($username, $password) 
    {        
        $user = $this->userManager->log($username);
        if(password_verify($password, $user['password'])) {
            $_SESSION['auth'] = $user;
            if ($user['role'] === 'user') {
                $view = new View("AdminUser");
                $view->generate(array('username' => $user['username']));
            } else {
                header("Location: ?action=admin");
                exit();
            }
            
        } else {
            throw new Exception('Identifiants incorrects');
        }
    }
    
    public function addUser($username, $email, $password) 
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(64));
        $this->userManager->add($username, $email, $password, $token);
        $user_id = $this->userManager->lastId();
        $subject = 'Confirmation création compte';
        $content = "Pour confirmer votre compte veuillez cliquer sur ce lien http://localhost/eclipse/test_mvc_poo/index.php?action=confirmUser&id=$user_id&token=$token";
        mail($email, $subject, $content);
        $validMsg = "Votre compte a bien été crée, un mail vous a été envoyé pour le confirmer";
        $view = new View("Login");
        $view->generate(array('validMsg' => $validMsg));

    }
    
    public function confirmationUser($id, $token)
    {
        $user = $this->userManager->findToken($id);
        if ($user && $user['confirmation_token'] == $token) {
            $this->userManager->activation($id);
            $_SESSION['auth'] = $user;
            $view = new View("AdminUser");
            $view->generate(array('username' => $user['username']));
            
        } else {
            throw new Exception('Action invalide');
        }
    }
    
    public function profile() 
    {        
        $view = new View("AdminUser");
        $view->generate(array());
    }
    
    public function logout() 
    {
        unset($_SESSION['auth']);
        header("Location: index.php");
        exit();
    }
}