<?php
include_once 'database.class.php';

class ProductController extends Database{

    public static function findDuplicates($sku_){
        global $database;
        $query = "SELECT * FROM disks";
        $result = $database->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        $query = "SELECT * FROM books";
        $result = $database->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        $query = "SELECT * FROM furniture";
        $result = $database->conn->query($query) or die($this->conn->error);
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }

        return 1;
    }

    public static function delete(){
        global $database;
        if(isset($_POST["deleteButton"])){
            if(isset($_POST["deleteD"])){
                foreach($_POST['deleteD'] as $toDelete){
                    $deleteQuery = "DELETE FROM disks WHERE SKU = '".$toDelete."'";
                    $database->conn->query($deleteQuery);
                }
            }
            if(isset($_POST["deleteB"])){
                foreach($_POST['deleteB'] as $toDelete){
                    $deleteQuery = "DELETE FROM books WHERE SKU = '".$toDelete."'";
                    $database->conn->query($deleteQuery);
                }
            }
            if(isset($_POST["deleteF"])){
                foreach($_POST['deleteF'] as $toDelete){
                    $deleteQuery = "DELETE FROM furniture WHERE SKU = '".$toDelete."'";
                    $database-> conn->query($deleteQuery);
                }
            }
            header("Location: ../");
            exit();
        }
    }

    public function validate(Product $productClass){
        $productClass->validateFeatures();
    }

}