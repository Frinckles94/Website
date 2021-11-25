<?php
include_once 'database.class.php';

class LoginController extends Database{

    protected $errors;

    public function __construct(){
        $this->errors = array();
    }

    public function validate(){
        if(isset($_POST["logInB"])){
            if(isset($_POST["log"])){
                $log = $_POST['log'];
            }else{
                $this->errors["log"] = "Login field is empty";
            }

            if(isset($_POST["pass"])){
                $pass = $_POST['pass'];
            }else{
                $this->errors["pass"] = "Password field is empty";
            }

            if(count($this->errors) == 0){
                $stmt = "SELECT * from users WHERE Name = $log or Email = $log";
                $this->connect();
                $result = $this->select($stmt);
                $user = $result->fetch_assoc();

                if($user['Password'] == $pass){
                    session_start();
                    $_SESSION["userid"] = $user["ID"];
                    header("Location: /");
                }else{
                    $this->errors["auth"] = "Invalid credentials";
                }
                
            }
            
        }
    }

    protected function getUser($log, $pass){
        
    }
}