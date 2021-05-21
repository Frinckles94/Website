<?php
    include "select.php";


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
            if(findDuplicates($_POST["sku"]) == 0){
                $errors["Sku"] = "SKU should be unique";
            }else{
                $sku = $_POST["sku"];
                
            }
        }
    

        
        if(empty($_POST["product"])){
            $errors["Product"] = "Please provide product type";
        }else{
            $productType = $_POST["product"];
            if($productType == "disk"){
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
                
            }else if($productType == "book"){
    
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
                
            }else if($productType == "furniture"){
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

        if(count($errors) == 0){
            if($productType=="disk") $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Size`) VALUES ('$sku', '$name', '$price', '$size')";
            else if($productType=="book") $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Weight`) VALUES ('$sku', '$name', '$price', '$weight')";
            else $addQuery = "INSERT INTO products (`SKU`, `Name`, `Price`, `Height`, `Width`, `Length`) VALUES ('$sku', '$name', '$price', '$height', '$width', '$length')";
            
            $conn -> query($addQuery) or die($conn->error);
            header("Location: ../home.php"); 
        }
   
    }

    function inputValue($value){
        if(isset($_POST["$value"])) echo $_POST["$value"];
    }

    function errorValue($error){
        global $errors;
        if(isset($errors["$error"])) echo $errors["$error"];
    }