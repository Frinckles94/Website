<?php
include "./classes.php";


class FormValidator{
    public $errors;

    public function __construct(){
        $this->errors = array();
    }

    public function forward(){
        if(isset($_POST["addButton"])){
            (new Product)->validateCommon();
        
            if(empty($_POST["product"])){
                $this->errors["Product"] = "Please provide product type";
            }else{
                $productType = $_POST["product"];
                (new ProductController)->validate(new $productType);
            }
            
            if(count($this->errors) == 0){
                $object = new $productType;
                $object-> addToDB();
            }
        }
        
        
    }

    public function inputValue($value){
        if(isset($_POST["$value"])) echo $_POST["$value"];
    }

    public function errorValue($error){
        if(isset($this->errors["$error"])) echo $this->errors["$error"];
    }
    


}

