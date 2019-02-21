<?php

abstract class AbstractManager 
{    
    private $bdd;
    
    private function getBdd() 
    {
        if ($this->bdd == null) {
            $this->bdd = new PDO("mysql:host=". HOST .";dbname=". DBNAME .";charset=utf8", USER, PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
    
    protected function queryExecute($sql, $params = null) 
    {
        if ($params == null) {
            $result = $this->getBdd()->query($sql);
        } else {
            $result = $this->getBdd()->prepare($sql);
            $result->execute($params);
        } 
        return $result;
    }

    // execute() take parameters as PARAM_STR, that doesn't work with OFFSET and LIMIT, so bindValue() with PARAM_INT.

    protected function queryExecuteInt($sql, $params) 
    {
        $result = $this->getBdd()->prepare($sql);
        foreach ($params as $key => $param) {            
            $result->bindValue(":$key", $param, PDO::PARAM_INT);
        }       
        $result->execute();
        return $result;
    }
    
    public function lastId()
    {
        $result = $this->getBdd()->lastInsertId();
        return $result;
    }
}
