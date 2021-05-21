<?php
    include "connect.php";

    $query = "SELECT * FROM products";
    $result = $conn->query($query) or die($conn->error);

    function findDuplicates($sku_){
        global $result;
        while($row = $result->fetch_assoc()){
            if($row["SKU"] == $sku_) return 0;
        }
        return 1;
    }