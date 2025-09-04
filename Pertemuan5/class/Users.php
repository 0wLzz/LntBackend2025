<?php
require_once "../database/Dbh.php";

class Users extends Dbh {
    protected function getAllUsers(){
        $sql = "SELECT * FROM users"; //Sql Query
        $stmt = $this->connect()->query($sql); //Connecting to Databse and Setting the Query;
        $results = $stmt->fetchAll(); //Fetching all of the Users in the Databse;
        $this->close(); //Don't Forget to Close the Database 
        return $results; //returning the All of the Users
    }
}