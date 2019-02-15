<?php

class LoginException extends Exception
{
    public function __construct($message=NULL, $code=0)
    {
        parent::__construct($message, $code);
        /*header("Location: ?action=loginView&error=$message");*/
    }
    
    
}