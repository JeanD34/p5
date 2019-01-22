<?php

class UserManager extends AbstractManager
{
    public function add($username, $email, $password, $token) {
        $sql = 'INSERT INTO user (username, email, password, confirmation_token) VALUES (?,?,?,?)';
        $this->queryExecute($sql, array($username, $email, $password, $token));
    }
    
    public function findToken($id) {
        $sql = 'SELECT * FROM user WHERE id = ?';
        $result = $this->queryExecute($sql, array($id));
        if ($result->rowCount() == 1) {
            $row = $result->fetch();
            return $row;
            
        } else {
            throw new Exception('L\'utilisateur numéro ' . $id . ' n\'existe pas.');
        }                
    }
    
    public function log($username) {
        $sql= 'SELECT * FROM user WHERE username = ? AND activated = 1';
        $result = $this->queryExecute($sql, array($username));
        if ($result->rowCount() == 1) {
            $row = $result->fetch();
            return $row;            
        } else {
            throw new Exception('L\'utilisateur numéro ' . $username . ' n\'existe pas.');
        } 
    }
    
    public function activation($id)
    {
        $sql = 'UPDATE user SET confirmation_token = NULL, activated = 1 WHERE id = ?';
        $this->queryExecute($sql, array($id));
    }
}