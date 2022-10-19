<?php
include_once 'database.class.php';
include_once 'users.class.php';
class RegisterController extends Database{

    protected $errors;

    public function __construct(){
        $this->errors = array();
    }

    protected function checkUser($uid){
        $query = "SELECT users_id FROM users WHERE users_id = $uid";
        $result = $this->conn->query($query) or die($this->conn->error);
        if($result){
            return 1;
        }else{
            return 0;
        }
    } 

    public function addToDB($user){
        $result = $user->fetch();
        $name = $result["name"];
        $surname = $result["surname"];
        $username = $result["username"];
        $email = $result["email"];;
        $password = $result["password"];
        $addQuery = "INSERT INTO users (`Name`, `Surname`, `Username`, `Email`, `Password`) VALUES ('$name', '$surname', '$username', '$email', '$password')";
        $this->connect();
        $this->change($addQuery);
        header("location: /");
        exit(); 
    }


    public function validate(){
        if(isset($_POST["RegButton"])){
            
            if(isset($_POST["name"])){
                $name = $_POST['name'];
            }else{ 
            }
            if(isset($_POST["surname"])){
                $surname = $_POST['surname'];
            }
            if(isset($_POST["username"])){
                $username = $_POST['username'];
                $stmt = "SELECT Username from users";
                $this->connect();
                $result = $this->select($stmt);
                while($row = $result->fetch_assoc()){
                    if($username == $row["Username"]){
                        $this->errors["username"] = "Username should be unique";
                        break;
                    } 
                }
                
            }else{
                $this->errors["username"] = "Username should not be empty";
            }
            if(isset($_POST["email"])){
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->errors["email"] = "Invalid email format";
                  }
            }else{
                $this->errors["email"] = "Email should not be empty";
            }
            if(isset($_POST["password"])){
                $password = $_POST['password'];
                if(strlen($password)<6){
                    $this->errors["password"] = "Password should be at least 6 symbols";
                }
            }else{
                $this->errors["password"] = "Password should not be empty";
            }
            if(isset($_POST["password2"])){
                $password2 = $_POST['password2'];
            }else{
                $this->errors["password2"] = "Please repeat password";
            }

            if($password != $password2){
                $this->errors["reg"] = "Passwords shoul match";
            }

            if(count($this->errors) == 0){
                $object = new User($name, $surname, $username, $email, $password);
                $this->addToDB($object);
            }else{
                header("Location: /register");
            }
        }
    }

    

}
