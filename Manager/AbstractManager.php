<?php

abstract class AbstractManager 
{    
    private $bdd;
    
    private function getBdd() 
    {
        if ($this->bdd == null) {
            $this->bdd = new PDO("mysql:host=". HOST .";dbname=". DBNAME .";charset=utf8", USER, PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
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
    
    public function rowsNumber($table)
    {
        $sql = 'SELECT COUNT(*) FROM' . $table;
        $result = $this->queryExecute($sql);
        $count = $result->fetch();
        return $count[0];
    }
}
