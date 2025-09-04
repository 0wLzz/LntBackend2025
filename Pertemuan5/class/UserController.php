<?php 
require_once 'Users.php';

class UserController extends Users {
    //Method to Show all of the Users
    public function showUsers(){
        $results = $this->getAllUsers();
        return $results;
    }

    // Method to handle creating a user
    public function createUser($data, $img) {

    }

    // Method to handle updating a user
    public function updateUser($data, $img) {

    }    

    public function deleteUser($userId) {

    }
}