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
                
                move_uploaded_file($params['tmp_name'], 'C:/wamp64/www/eclipse/test_mvc_poo/Content/images/' . basename($params['name']));
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
                
                move_uploaded_file($params['tmp_name'], 'C:/wamp64/www/eclipse/test_mvc_poo/Content/images/' . basename($params['name']));
                return basename($params['name']);
            }
        }        
    }

    public static function validateEmail($email)
    {
        if(!preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $email)) {
            throw new LoginException('L\'adresse email n\'est pas au bon format.');
        }
    }
}