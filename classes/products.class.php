<?php

include_once 'product.controller.php';

class Product{
    protected $sku;
    protected $name;
    protected $price;

    public function addToDB(){

    }
    public static function validateFeatures(){

    }

    public function validateCommon(){
        global $formValidator;
        global $database;
        global $name;
        global $price;
        global $sku;
        if(empty($_POST["name"])){
            $formValidator->errors["Name"] = "Please provide name";
        }else{
            $name = $_POST["name"];
        }

        if(empty($_POST["price"])){
            $formValidator->errors["Price"] = "Please provide price";
        }else{
            if(is_numeric($_POST["price"])){
                if($_POST["price"] <= 0 ){
                    $formValidator->errors["Price"] = "Please provide positive values";
                }else{
                    $price = $_POST["price"];
                }
            }else{
                $formValidator->errors["Price"] = "Please provide data of indicated type";
            }
        }

        if(empty($_POST["sku"])){
            $formValidator->errors["Sku"] = "Please provide SKU";
        }else{
            if(ProductController::findDuplicates($_POST["sku"]) == 0){
                $formValidator->errors["Sku"] = "SKU should be unique";
            }else{
                $sku = $_POST["sku"];
                
            }
        }
    }

}

class Disk extends Product{
    protected $size;

    public function __construct(){
        global $name;
        global $sku;
        global $price;
        global $size;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }

    public static function selectFromDB(){
        global $database;
        $query = "SELECT * FROM disks";
        $result = $database->select($query);
        return $result;
    }

    public function addToDB(){
        global $database;
        $addQuery = "INSERT INTO disks (`SKU`, `Name`, `Price`, `Size`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->size')";
        $database->add($addQuery);
        header("Location: ../");
        exit(); 
    } 

    public static function validateFeatures(){
        global $formValidator;
        global $size;
        if(empty($_POST["size"])){
            $formValidator->errors["Size"] = "Please provide size";
        }else{
            if(is_numeric($_POST["size"])){
                if($_POST["size"]<=0){
                    $formValidator->errors["Size"] = "Please provide positive values"; 
                }else{
                    $size = $_POST["size"];
                }
            }else{
                $formValidator->errors["Size"] = "Please provide data of indicated type";
            }
        }
            
    }
}



class Book extends Product{
    protected $weight;

    public function __construct(){
        global $sku;
        global $name;
        global $price;
        global $weight;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }


    public static function selectFromDB(){
        global $database;
        $query = "SELECT * FROM books";
        $result = $database->select($query);
        return $result;

    }

    public function addToDB(){
        global $database;
        $addQuery = "INSERT INTO books (`SKU`, `Name`, `Price`, `Weight`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->weight')";
        $database->add($addQuery);
        header("Location: ../");
        exit(); 
    } 


    public static function validateFeatures(){
        global $formValidator;
        global $weight;
        if(empty($_POST["weight"])){
            $formValidator->errors["Weight"] = "Please provide weight";
        }else{
            if(is_numeric($_POST["weight"])){
                if($_POST["weight"]<=0){
                    $formValidator->errors["Weight"] = "Please provide positive values"; 
                }else{
                    $weight = $_POST["weight"];
                }
            }else{
                $formValidator->errors["Weight"] = "Please provide data of indicated type";
            }
        }
    }

}



class Furniture extends Product{
    protected $height;
    protected $width;
    protected $length;

    public function __construct(){
        global $sku;
        global $name;
        global $price;
        global $height;
        global $width;
        global $length;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }


    public function addToDB(){
        global $database;
        $addQuery = "INSERT INTO furniture (`SKU`, `Name`, `Price`, `Height`, `Width`, `Length`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->height', '$this->width', '$this->length')";    
        $database->add($addQuery);
        header("Location: ../");
        exit(); 
    } 

    public static function selectFromDB(){
        global $database;
        $query = "SELECT * FROM furniture";
        $result = $database->select($query);
        return $result;

    }


    public static function validateFeatures(){
        global $formValidator;
        global $height;
        global $width;
        global $length;
        if(empty($_POST["height"])){
            $formValidator->errors["Height"] = "Please provide height";
        }else{
            if(is_numeric($_POST["height"])){
                if($_POST["height"]<=0){
                    $formValidator->errors["Height"] = "Please provide positive values"; 
                }else{
                    $height = $_POST["height"];
                }
            }else{
                $formValidator->errors["Height"] = "Please provide data of indicated type";
            }
        }

        if(empty($_POST["width"])){
            $formValidator->errors["Width"] = "Please provide width";
        }else{
            if(is_numeric($_POST["width"])){
                if($_POST["width"]<=0){
                    $formValidator->errors["Width"] = "Please provide positive values"; 
                }else{
                    $width = $_POST["width"];
                }
            }else{
                $formValidator->errors["Width"] = "Please provide data of indicated type";
            }
        }

        if(empty($_POST["length"])){
            $formValidator->errors["Length"] = "Please provide length";
        }else{
            if(is_numeric($_POST["length"])){
                if($_POST["length"]<=0){
                    $formValidator->errors["Length"] = "Please provide positive values"; 
                }else{
                    $length = $_POST["length"];
                }
            }else{
                $formValidator->errors["Length"] = "Please provide data of indicated type";
            }
        }
    }
    
}


