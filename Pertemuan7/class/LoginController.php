<?php
require_once 'Users.php';

class LoginController extends Users{
    private $email;
    private $password;

    public function login($data) {
        $this->email = $data['email'];
        $this->password = $data['password'];


        $result = $this->checkDetail();
        if($result === true){

            if(isset($data["remember"])){
                setcookie("email", $data["email"], time() + 3600, "/");
            }

            session_start();
            $_SESSION["login"] = true;
            $_SESSION["user"] = 'Owen';
            header("Location: index.php");
            exit();
        }   
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        
        setcookie("email", "", time() - 3600, "/");
        
        header("Location: Login.php");
        exit();
    }

    public function showError($error) {
        switch ($error) {
            case 'emptyinput':
                echo '<script>alert("Please fill in all required fields.");</script>';
                break;
            case 'invalidemail':
                echo '<script>alert("Invalid Email address");</script>';
                break;
            case 'invalidpassword':
                echo '<script>alert("Wrong password.");</script>';
                break;
            default:
                echo '<script>alert("An unknown error occurred.");</script>';
        }
    }  
    
    private function checkDetail() {    
        // Check if input is not empty
        if ($this->isNotEmptyInput() == false) {
            header("Location:" . $_SERVER['PHP_SELF'] . "?error=emptyinput" . (isset($_GET['id']) ? "&id=" . $_GET['id'] : ""));
            exit();
        }
        
        $user = $this->getUserEmail($this->email);
        $user = $user[0];

        if(!$user > 0){
            header("Location:" . $_SERVER['PHP_SELF'] . "?error=invalidemail" . (isset($_GET['id']) ? "&id=" . $_GET['id'] : ""));
            exit();
        }

        if($user['pass'] !== $this->password){
            header("Location:" . $_SERVER['PHP_SELF'] . "?error=invalidpassword" . (isset($_GET['id']) ? "&id=" . $_GET['id'] : ""));
            exit();
        }
    
        return true;
    }

    private function isNotEmptyInput() {
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }
}