<?php

include_once 'register.controller.php';


class User{
    protected $name;
    protected $surname;
    protected $username;
    protected $email;
    protected $password;

    public function __construct($name, $surname, $username, $email, $password){
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function fetch(){
        $result = array(
            'name' => "$this->name",
            'surname' => "$this->surname",
            'username' => "$this->username",
            'email' => "$this->email",
            'password' => "$this->password",
        );

        return $result;
    }


    public static function logOut(){
        if(isset($_POST["logoutbutton"])){
            session_start();
            session_unset();
            session_destroy();
            header("location: /");
        }
    }


}
