<?php

class Database{
    protected $user = "root";
    protected $password = "";
    protected $host = "localhost:3308";
    protected $dbname = "test";
    protected $conn;

    public function connect(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die("Connection failed");
        }
    }

    function findDuplicates($sku_){
        $result = $this->select();
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }
        return 1;
    }

    public function select(){
        $query = "SELECT * FROM products";
        $result = $this->conn->query($query) or die($conn->error);
        return $result;
    }

    public function delete(){
        if(isset($_POST["delete"])){
            foreach($_POST['delete'] as $toDelete){
                $deleteQuery = "DELETE FROM products WHERE SKU = '".$toDelete."'";
                $this->conn->query($deleteQuery);
                
            }
            header("Location: ../");
        }
    }

    public function add($addQuery){
        $this->conn->query($addQuery) or die($this->conn->error);
    }
}

