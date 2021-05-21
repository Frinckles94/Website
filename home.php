<?php


include_once './database/connect.php';
include './database/form.php';
include './database/delete.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title> Product List </title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <form method="POST" action="">
            <header>
                <div class="container"> 
                    <div id="heading">
                        <h1>Product list</h1>
                    </div>

                    <nav>
                        <ul> 
                            <li> <a href="/product/add"> Add </a> </li>
                            <li> <input type="submit" value="Mass Delete" name="deleteButton"> </li>
                        </ul>
                    </nav>
                </div>
            </header>

        
            <div class= container>
                <?php
                    while($row = $result->fetch_assoc()){
                        $sku = $row["SKU"];
                        $name = $row["Name"];
                        $price = $row["Price"];
                        $size = $row["Size"];
                        $weight = $row["Weight"];
                        $width = $row["Width"];
                        $height = $row["Height"];
                        $length = $row["Length"];

                ?>
                <div class="box">
                    <input type="checkbox" name="delete[]" value="<?= $sku ?>">
                    <p><?= $sku ?> </p>
                    <p><?= $name ?> </p>
                    <p><?= $price." $" ?> </p>
                    <p>
                        <?php 
                            if($size != NULL) echo $size." MB";
                            else if($weight !=NULL) echo $weight." KG";
                            else echo $height."x".$width."x".$length." CM";
                        ?> 
                    
                    </p>
                </div>
                <?php
                    }
                ?>
                
                
            </div>
        </form>



        <footer>
            <p> Scandiweb Test Assignment </p>
        </footer>


    </body>

</html>

