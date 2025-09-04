<?php
class Dbh { //Database Handler
    private $host = 'localhost';
    private $username = 'root';
    private $password = ''; // DEFAULT No Password for MySQL 
    private $dbName = 'oop'; //Nama Database yang ingin diakses
    private $pdo;
    
    protected function connect(){
        $dsn = "mysql:host={$this->host};dbname={$this->dbName}"; //DataSourceName

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password); //Php Data Object
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }

        return $this->pdo;
    }

    protected function close() {
        $this->pdo = null;
    }    
}


