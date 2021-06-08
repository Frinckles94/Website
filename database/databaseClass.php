<?php

class Database{
    protected $user = "root";
    protected $password = "";
    protected $host = "localhost:3308";
    protected $dbname = "test2";
    protected $conn;

    public function connect(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die("Connection failed");
        }
    }

    function findDuplicates($sku_){
        $query = "SELECT * FROM disks";
        $result = $this->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        $query = "SELECT * FROM books";
        $result = $this->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        $query = "SELECT * FROM furniture";
        $result = $this->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        return 1;
    }

    public function select($query){
        $result = $this->conn->query($query) or die($this->conn->error);
        return $result;
    }

    public function delete(){
        if(isset($_POST["deleteButton"])){
            if(isset($_POST["deleteD"])){
                foreach($_POST['deleteD'] as $toDelete){
                    $deleteQuery = "DELETE FROM disks WHERE SKU = '".$toDelete."'";
                    $this->conn->query($deleteQuery);
                }
            }
            if(isset($_POST["deleteB"])){
                foreach($_POST['deleteB'] as $toDelete){
                    $deleteQuery = "DELETE FROM books WHERE SKU = '".$toDelete."'";
                    $this->conn->query($deleteQuery);
                }
            }
            if(isset($_POST["deleteF"])){
                foreach($_POST['deleteF'] as $toDelete){
                    $deleteQuery = "DELETE FROM furniture WHERE SKU = '".$toDelete."'";
                    $this->conn->query($deleteQuery);
                }
            }
            header("Location: ../");
            exit();
        }
        

    }

    public function add($addQuery){
        $this->conn->query($addQuery) or die($this->conn->error);
    }
}

