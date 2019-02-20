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

    public function contactMail()
    {
        if (!empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['subject']) && !empty($_REQUEST['message'])) {
            
            Validator::validateEmail($_REQUEST['email']);

            $headers = 'From: "Message - Blog - ' . $_REQUEST['name'] .'"<webdev@jeandescorps.fr>'."\n"; 
            $headers .= 'Reply-To: ' . $_REQUEST['email'] . "\n"; 
            $headers .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
            $headers .= 'Content-Transfer-Encoding: 8bit';

            if(!mail('jean.wevdev@gmail.com', $_REQUEST['subject'], $_REQUEST['message'], $headers)) {
                throw new MailException('Une erreur est survenue. Pour nous contactez directement : jean.webdev@gmail.com');
            } else {
                $_SESSION['validMail'] = 'Votre email a été envoyé avec succès. Nous vous re-contacterons dès que possible';
                header('Location: index.php#contactForm');
            }
        } else {
            throw new MailException('Tous les champs sont requis !');
        }
    }

    public function errorMail($error)
    {
        $view = new View('Home');
        $posts = $this->postManager->findLast();
        $view->generate(array('posts' => $posts, 'error' => $error));
    }
}