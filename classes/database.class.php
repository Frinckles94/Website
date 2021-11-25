<?php

class Database{
    protected $user = "root";
    protected $password = "";
    protected $host = "localhost";
    protected $dbname = "qual";
    protected $conn;


    public function connect(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die("Connection failed");
        }
    }   

    public function select($query){
        $result = $this->conn->query($query) or die($this->conn->error);
        return $result;
    }


    public function change($addQuery){
        $this->conn->query($addQuery) or die($this->conn->error);
    }
}

