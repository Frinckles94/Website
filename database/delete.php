<?php
    if(isset($_POST["deleteButton"])){

        if(isset($_POST["delete"])){

            foreach($_POST['delete'] as $toDelete){
                $deleteQuery = "DELETE FROM products WHERE SKU = '".$toDelete."'";
                $conn -> query($deleteQuery);
                
            }
            header("Location: ../");
            exit();
        }
    }