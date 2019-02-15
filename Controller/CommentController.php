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
        $view = new View('AdminUpdateComment');
        $view->generate(array('comment' => $comment));
        
    }
    
    public function updateComment()
    {
        $comment = $this->commentManager->find($_REQUEST['id']);
        $comment->hydrate($_REQUEST);
        $this->commentManager->update($comment);
        header("Location: ?action=adminComments");
        exit();
    }
    
    public function deleteComment()
    {
        $comment = $this->commentManager->find($_REQUEST['id']);
        $this->commentManager->delete($comment);
        header("Location: ?action=adminComments");
        exit();
    }
    
    public function adminComments()
    {
        $invalidateComments = $this->commentManager->findAllInvalidate();
        $validateComments = $this->commentManager->findAllValidate();
        $view = new View('AdminComments');
        $view->generate(array('invalidateComments' => $invalidateComments, 'validateComments' => $validateComments));
    }
}