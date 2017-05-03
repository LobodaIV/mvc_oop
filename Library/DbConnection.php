<?php

namespace Library;

class DbConnection
{
    private $pdo;
    
    private static $instance;
    
    private function __construct() 
    {
        $this->pdo = new \PDO('mysql: host=localhost; dbname=mvc', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    private function __clone() {}
    
    public function getPdo()
    {
        return $this->pdo;
    }
    
    public function __wakeUp() 
    {
        throw new \Exception();  
    }
    
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DbConnection();
        }
        
        return self::$instance;
    }
}