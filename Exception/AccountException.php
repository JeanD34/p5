<?php

class AccountException extends Exception
{
    public function __construct($message=NULL, $code=0)
    {
        parent::__construct($message, $code);
    }    
}