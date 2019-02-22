<?php 

class CommentController {
    
    private $commentManager;
    private $userController;
    
    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->userController = new UserController();      
    }
    
    public function comment()
    {   
        if(!empty($_REQUEST['id_post_fk']) && !empty($_REQUEST['content'])) {          
            $comment = new Comment();
            $_REQUEST['id_user_fk'] = $_SESSION['auth']['id'];
            if(Validator::validateCommentLength($_REQUEST['content'])) {
                $comment->hydrate($_REQUEST);
                $postId = $comment->getId_post_fk();
                $this->commentManager->add($comment);
                $headers = 'From: "Blog - Nouveau Commentaire"<webdev@jeandescorps.fr>'."\n";  
                $headers .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
                $headers .= 'Content-Transfer-Encoding: 8bit';
                $subject = 'Nouveau commentaire sur votre blog';
                $message = $_SESSION['auth']['username'] . ' à ajouté un commentaire à votre blog, vous pouvez allez le valider ici : '. CONFIRM_MAIL_LINK .'index.php?action=adminComments';
                mail('jean.wevdev@gmail.com', $subject, $message, $headers);
                $_SESSION['comment'] = 'Votre commentaire a été enregistré, il sera validé dans les plus bref délais.';            
                header("Location: ?action=post&id=$postId#comment-block");
                exit();
            } else {
                $_SESSION['postId'] = htmlspecialchars($_REQUEST['id_post_fk']);
                throw new CommentException('Les commentaires sont limités à 1000 caractères');
            }
        } else {
            $_SESSION['postId'] = htmlspecialchars($_REQUEST['id_post_fk']);
            throw new CommentException('Tous les champs sont requis !');
        }
    }
    
    public function validateComment()
    {   
        $comment = $this->commentManager->find($_REQUEST['id']);
        $this->commentManager->validate($comment);
        header("Location: ?action=adminComments");
        exit();
    }
    
    public function updateCommentView($message = null)
    {
        if(!empty($_REQUEST['id'])) {
            $comment = $this->commentManager->find($_REQUEST['id']);
            if($_SESSION['auth']['role'] !== 'admin') {
                if($comment->getId_user_fk() != $_SESSION['auth']['id']) {
                    throw new Exception('Vous essayez de modifier un article qui ne vous appartient pas !');
                } else {
                    $view = new View('AdminUpdateComment');
                    $view->generate(array('comment' => $comment, 'message' => $message));
                }
            } else {            
                $view = new View('AdminUpdateComment');
                $view->generate(array('comment' => $comment));
            }
        } else {
            throw new Exception('Cette action n\'est pas autoriséé.');
        }
    }
    
    public function updateComment()
    {
        if(!empty($_REQUEST['id']) && !empty($_REQUEST['content'])) {
            $comment = $this->commentManager->find($_REQUEST['id']);
            if($_SESSION['auth']['role'] !== 'admin') {
                if($comment->getId_user_fk() != $_SESSION['auth']['id']) {
                    throw new Exception('Vous essayez de modifier un article dont vous n\'êtes pas l\'auteur !');
                } else {
                    if(!empty($_REQUEST['id']) && !empty($_REQUEST['content'])) {
                        if(Validator::validateCommentLength($_REQUEST['content'])) {               
                            $comment->hydrate($_REQUEST);
                            $this->commentManager->userUpdate($comment);
                            $headers = 'From: "Blog - Modification Commentaire"<webdev@jeandescorps.fr>'."\n";  
                            $headers .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
                            $headers .= 'Content-Transfer-Encoding: 8bit';
                            $subject = 'Un commentaire a été modifié sur votre blog';
                            $message = $_SESSION['auth']['username'] . ' à modifié un commentaire à votre blog, vous pouvez allez le valider ici : '. CONFIRM_MAIL_LINK .'index.php?action=adminComments';
                            mail('jean.descorps@laposte.net', $subject, $message, $headers);
                            $message = 'Votre commentaire a été mis à jour, il est désormais en attente de validation';
                            $this->userController->profile($message);
                        } else {
                            throw new UpdateCommentException('Les commentaires sont limités à 1000 caractères');
                        }
                    } else {
                        throw new UpdateCommentException('Tous les champs sont requis !');
                    }
                }
            } else {
                if(Validator::validateCommentLength($_REQUEST['content'])) {
                    $comment->hydrate($_REQUEST);
                    $this->commentManager->update($comment);
                    header("Location: ?action=adminComments");
                    exit();
                } else {
                    throw new UpdateCommentException('Les commentaires sont limités à 1000 caractères');
                }
            }
        } else {
            throw new Exception('Cette action n\'est pas autoriséé.');
        }
    }
    
    public function deleteComment()
    {
        if(!empty($_REQUEST['id'])) {
            $comment = $this->commentManager->find($_REQUEST['id']);
            if($_SESSION['auth']['role'] !== 'admin') {
                if($comment->getId_user_fk() != $_SESSION['auth']['id']) {
                    throw new Exception('Vous essayez de supprimer un article dont vous n\'êtes pas l\'auteur !');
                } else {
                    $this->commentManager->delete($comment);
                    header("Location: ?action=profile");
                    exit();
                }
            } else {
                $this->commentManager->delete($comment);
                header("Location: ?action=adminComments");
                exit();
            }
        } else {
            throw new Exception('Cette action n\'est pas autoriséé.');
        }
    }
    
    public function adminComments()
    {
        $pageCV = (!empty($_GET['pageCV']) ? $_GET['pageCV'] : 1);
        $pageCINV = (!empty($_GET['pageCINV']) ? $_GET['pageCINV'] : 1);
        $limit = 9;
        $offsetCV = ($pageCV - 1) * $limit;
        $offsetCINV = ($pageCINV - 1) * $limit;     
        $totalCV = $this->commentManager->commentNumber('1');
        $totalCINV = $this->commentManager->commentNumber('0');
        $totalPagesCV = ceil($totalCV/$limit);
        $totalPagesCINV = ceil($totalCINV/$limit);
        $validateComments = $this->commentManager->findAllValidate($limit, $offsetCV);
        $invalidateComments = $this->commentManager->findAllInvalidate($limit, $offsetCINV);   
        $view = new View('AdminComments');
        $view->generate(array('invalidateComments' => $invalidateComments, 'validateComments' => $validateComments, 'pageCV' => $pageCV, 'pageCINV' => $pageCINV, 'totalPagesCV' => $totalPagesCV, 'totalPagesCINV' => $totalPagesCINV));
    }

    public function errorComment($error)
    {
        $_SESSION['error'] = $error;
        header('Location: ?action=post&id='. $_SESSION['postId'] .'#comment-block');
        exit();
    }

    public function errorUpdateComment($error)
    {
        $this->updateCommentView($error);
    }
}