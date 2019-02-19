<?php 

class CommentController {
    
    private $commentManager;
    
    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }
    
    public function comment()
    {     
        $comment = new Comment();
        $_REQUEST['id_user_fk'] = $_SESSION['auth']['id'];
        $comment->hydrate($_REQUEST);
        $postId = $comment->getId_post_fk();
        $this->commentManager->add($comment);
        //$this->post($postId);
        header("location: ?action=post&id=$postId#comment-block");
        exit();
    }
    
    public function validateComment()
    {   
        $comment = $this->commentManager->find($_REQUEST['id']);
        $this->commentManager->validate($comment);
        header("Location: ?action=adminComments");
        exit();
    }
    
    public function updateCommentView()
    {
        $comment = $this->commentManager->find($_REQUEST['id']);
        if($_SESSION['auth']['role'] !== 'admin') {
            if($comment->getId_user_fk() != $_SESSION['auth']['id']) {
                throw new Exception('Vous essayez de modifier un article qui ne vous appartient pas !');
            } else {
                $view = new View('AdminUpdateComment');
                $view->generate(array('comment' => $comment));
            }
        } else {            
            $view = new View('AdminUpdateComment');
            $view->generate(array('comment' => $comment));
        }
        
    }
    
    public function updateComment()
    {
        $comment = $this->commentManager->find($_REQUEST['id']);
        if($_SESSION['auth']['role'] !== 'admin') {
            if($comment->getId_user_fk() != $_SESSION['auth']['id']) {
                throw new Exception('Vous essayez de modifier un article dont vous n\'êtes pas l\'auteur !');
            } else {
                $comment->hydrate($_REQUEST);
                $this->commentManager->userUpdate($comment);
                header("Location: ?action=profile");
                exit();
            }
        } else {
            $comment->hydrate($_REQUEST);
            $this->commentManager->update($comment);
            header("Location: ?action=adminComments");
            exit();
        }

    }
    
    public function deleteComment()
    {
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
}