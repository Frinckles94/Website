<?php

interface Product{
    public function addToDB();
    public static function validateForm();

}



class Disk implements Product{
    protected $sku;
    protected $name;
    protected $price;
    protected $size;

    public function __construct(){
        global $sku;
        global $name;
        global $price;
        global $size;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }


    public function addToDB(){
        global $conn;
        $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Size`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->size')";
        $conn -> query($addQuery) or die($conn->error);
        header("Location: ../");
        exit(); 
    } 

    public static function validateForm(){
        global $errors;
        global $size;
        if(empty($_POST["size"])){
            $errors["Size"] = "Please provide size";
        }else{
            if(is_numeric($_POST["size"])){
                if($_POST["size"]<0){
                    $errors["Size"] = "Please provide positive values"; 
                }else{
                    $size = $_POST["size"];
                }
            }else{
                $errors["Size"] = "Please provide data of indicated type";
            }
        }
            
    }
}



class Book implements Product{
    protected $sku;
    protected $name;
    protected $price;
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


    public function addToDB(){
        global $conn;
        $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Weight`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->weight')";
        $conn -> query($addQuery) or die($conn->error);
            header("Location: ../");
            exit(); 
    } 


    public static function validateForm(){
        global $errors;
        global $weight;
        if(empty($_POST["weight"])){
            $errors["Weight"] = "Please provide weight";
        }else{
            if(is_numeric($_POST["weight"])){
                if($_POST["weight"]<0){
                    $errors["Weight"] = "Please provide positive values"; 
                }else{
                    $weight = $_POST["weight"];
                }
            }else{
                $errors["Weight"] = "Please provide data of indicated type";
            }
        }
    }

}



class Furniture implements Product{
    protected $sku;
    protected $name;
    protected $price;
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
        global $conn;
        $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Height`, `Width`, `Length`) VALUES ('$this->sku', '$this->name', '$this->price', '$this->height', '$this->width', '$this->length')";    
        $conn -> query($addQuery) or die($conn->error);
        header("Location: ../");
        exit(); 
    } 


    public static function validateForm(){
        global $errors;
        global $height;
        global $width;
        global $length;
        if(empty($_POST["height"])){
            $errors["Height"] = "Please provide height";
        }else{
            if(is_numeric($_POST["height"])){
                if($_POST["height"]<0){
                    $errors["Height"] = "Please provide positive values"; 
                }else{
                    $height = $_POST["height"];
                }
            }else{
                $errors["Height"] = "Please provide data of indicated type";
            }
        }

        if(empty($_POST["width"])){
            $errors["Width"] = "Please provide width";
        }else{
            if(is_numeric($_POST["width"])){
                if($_POST["width"]<0){
                    $errors["Width"] = "Please provide positive values"; 
                }else{
                    $width = $_POST["width"];
                }
            }else{
                $errors["Width"] = "Please provide data of indicated type";
            }
        }

        if(empty($_POST["length"])){
            $errors["Length"] = "Please provide length";
        }else{
            if(is_numeric($_POST["length"])){
                if($_POST["length"]<0){
                    $errors["Length"] = "Please provide positive values"; 
                }else{
                    $length = $_POST["length"];
                }
            }else{
                $errors["Length"] = "Please provide data of indicated type";
            }
        }
    }
    
}


class ProductController{
    public function validate(Product $productClass){
        $productClass->validateForm();
    }
}

