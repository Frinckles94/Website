<?php
    include "./classes.php";

    $errors = array();

    if(isset($_POST["addButton"])){
        $size = NULL;
        $weight = NULL;
        $width = NULL;
        $height = NULL;
        $length = NULL; 

        if(empty($_POST["name"])){
            $errors["Name"] = "Please provide name";
        }else{
            $name = $_POST["name"];
        }

        if(empty($_POST["price"])){
            $errors["Price"] = "Please provide price";
        }else{
            if(is_numeric($_POST["price"])){
                if($_POST["price"] < 0 ){
                    $errors["Price"] = "Please provide positive values";
                }else{
                    $price = $_POST["price"];
                }
            }else{
                $errors["Price"] = "Please provide positive values";
            }
        }

        if(empty($_POST["sku"])){
            $errors["Sku"] = "Please provide SKU";
        }else{
            if($database->findDuplicates($_POST["sku"]) == 0){
                $errors["Sku"] = "SKU should be unique";
            }else{
                $sku = $_POST["sku"];
                
            }
        }
    
        if(empty($_POST["product"])){
            $errors["Product"] = "Please provide product type";
        }else{
            $productType = $_POST["product"];
            (new ProductController)->validate(new $productType);
        }
        
        if(count($errors) == 0){
            $object = new $productType;
            $object-> addToDB();
        }
   
    }

    function inputValue($value){
        if(isset($_POST["$value"])) echo $_POST["$value"];
    }

    function errorValue($error){
        global $errors;
        if(isset($errors["$error"])) echo $errors["$error"];
    }