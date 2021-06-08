<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <link rel="shortcut icon" href="#">
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
                            <li> <input type="submit" value="Mass Delete" name="deleteButton" onclick="<?php $database->delete();?>"> </li>
                        </ul>
                    </nav>
                </div>
            </header>
        
            <div class= container>
                <?php
                    $result = Disk::selectFromDB();
                    if($result!=null){
                        while($row = $result->fetch_assoc()){
                            $sku = $row["SKU"];
                            $name = $row["Name"];
                            $price = $row["Price"];
                            $size = $row["Size"];
                ?>
                        <div class="box">
                            <input type="checkbox" name="deleteD[]" value="<?= $sku ?>">
                            <p><?= $sku ?> </p>
                            <p><?= $name ?> </p>
                            <p><?= $price." $" ?> </p>
                            <p><?= "Size: ".$size." MB "?></p>
                        </div>
                <?php
                    }
                }
                ?>
                


                <?php
                    $result = Book::selectFromDB();
                    if($result!=null){
                        while($row = $result->fetch_assoc()){
                            $sku = $row["SKU"];
                            $name = $row["Name"];
                            $price = $row["Price"];
                            $weight = $row["Weight"];
                ?>
                        <div class="box">
                            <input type="checkbox" name="deleteB[]" value="<?= $sku ?>">
                            <p><?= $sku ?> </p>
                            <p><?= $name ?> </p>
                            <p><?= $price." $" ?> </p>
                            <p><?= "Weight: ".$weight." KG "?></p>
                        </div>
                <?php
                    }
                }
                ?>


                <?php
                    $result = Furniture::selectFromDB();
                    if($result!=null){
                        while($row = $result->fetch_assoc()){
                            $sku = $row["SKU"];
                            $name = $row["Name"];
                            $price = $row["Price"];
                            $width = $row["Width"];
                            $height = $row["Height"];
                            $length = $row["Length"];
                ?>
                        <div class="box">
                            <input type="checkbox" name="deleteF[]" value="<?= $sku ?>">
                            <p><?= $sku ?> </p>
                            <p><?= $name ?> </p>
                            <p><?= $price." $" ?> </p>
                            <p><?= "Dimention: ".$height."x".$width."x".$length?></p>
                        </div>
                <?php
                    }
                }
                ?>
                
                
            </div>
            
        </form>

        <footer>
            <p> Scandiweb Test Assignment </p>
        </footer>


    </body>

</html>

<?php
ob_end_flush();
?>