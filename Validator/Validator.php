<?php

class Validator {
   
    public static function validateUser()
    {
        if(isset($_SESSION['auth'])) {
            return true;
        }
    }
    
    public static function validateAdmin()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 'admin') {
            return true;
        }
    }
    
    
    public static function validatePostImage($params)
    {            
        if ($params['size'] <= 1000000) {
            
            $file_info = pathinfo($params['name']);
            $upload_extension = $file_info['extension'];
            $valid_extension = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($upload_extension, $valid_extension)) {               
                move_uploaded_file($params['tmp_name'], UPLOAD_IMAGE_PATH . basename($params['name']));
                return basename($params['name']);
            }
        }        
    }
    
    public static function validateAvatar($params)
    {            
        if ($params['size'] <= 1000000) {
            
            $file_info = pathinfo($params['name']);
            $upload_extension = $file_info['extension'];
            $valid_extension = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($upload_extension, $valid_extension)) {               
                move_uploaded_file($params['tmp_name'], UPLOAD_AVATAR_PATH . basename($params['name']));
                return basename($params['name']);
            } else {
                throw new AvatarException('Votre image doit être au format jpg, jpeg, gif ou png.');
            }
        } else {
            throw new AvatarException('Votre image ne doit pas excéder 1 Mo.');
        }
    }

    public static function validateEmail($email)
    {
        if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $email)) {
            return true;
        }
    }

    public static function validateLength($fullComment, $idComment)
    {   
        $fullComment = htmlspecialchars($fullComment);
        $idComment = htmlspecialchars($idComment);
        $commentLength = 150;
        if(strlen($fullComment) <= $commentLength) {
            $content = $fullComment;
        } else {
            $content = substr($fullComment, 0, $commentLength) . '<a href="?action=editCommentView&id='. $idComment .'">...</a>';
        }
        return $content;
    }

    public static function validatePasswordLength($password)
    {
        if(strlen($password >= 6)) {
            return true;
        }
    }

    public static function validateCommentLength($comment)
    {
        if(strlen(($comment)) < 1000) {
            return true;
        }
    }

    public static function validateDescriptionLength($description)
    {
        if(strlen($description < 800)) {
            return true;
        }
    }

    public static function clean($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
      }
}