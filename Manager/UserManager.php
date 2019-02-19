<?php

class UserManager extends AbstractManager
{
    public function findAllActivated($limit, $offset)
    {
        $users = [];
        $sql = 'SELECT * FROM user WHERE activated = 1 ORDER BY id DESC LIMIT :limit OFFSET :offset';
        $result = $this->queryExecuteInt($sql, array('limit' => $limit, 'offset' => $offset));
        foreach ($result->fetchAll() as $row) {
            $user = new User();
            $user->hydrate($row);
            $users[] = $user;
        }
  
        return $users;
    }

    public function findAllInactive($limit, $offset)
    {
        $users = [];
        $sql = 'SELECT * FROM user WHERE activated = 0 ORDER BY id DESC LIMIT :limit OFFSET :offset';
        $result = $this->queryExecuteInt($sql, array('limit' => $limit, 'offset' => $offset));
        foreach ($result->fetchAll() as $row) {
            $user = new User();
            $user->hydrate($row);
            $users[] = $user;
        }
  
        return $users;
    }

    public function userNumber($valid)
    {
        $sql = 'SELECT COUNT(*) FROM comment WHERE validated = ?';
        $result = $this->queryExecute($sql, array($valid));
        $count = $result->fetch();
        return $count[0];
    }


    public function add($user) {
        $sql = 'INSERT INTO user (username, email, password, confirmation_token, inscription_date) VALUES (?,?,?,?, NOW())';
        $this->queryExecute($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getConfirmation_token()));
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
            throw new Exception('L\'utilisateur ' . $username . ' n\'existe pas.');
        } 
    }
    
    public function activation($id)
    {
        $sql = 'UPDATE user SET confirmation_token = NULL, activated = 1 WHERE id = ?';
        $this->queryExecute($sql, array($id));
    }
    
    public function find($id)
    {
        $sql ='SELECT * FROM user WHERE id = ?';
        $result = $this->queryExecute($sql, array($id));
        if ($result->rowCount() == 1) {
            $row = $result->fetch();
            $user = new User();
            $user->hydrate($row);
            return $user;
        } else {
            throw new Exception('L\'utilisateur numéro ' . $id . ' n\'existe pas.');
        } 
    }

    public function update($user)
    {
        $sql = 'UPDATE user SET username = ?, email = ?, password = ?, website = ?, avatar = ?, description = ? WHERE id = ?';
        $this->queryExecute($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getWebsite(), $user->getAvatar(), $user->getDescription(), $user->getId(),));
    }

    public function delete($id) {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->queryExecute($sql, array($id));
    }
}