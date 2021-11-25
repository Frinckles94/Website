<?php
include_once 'header.php';
include_once './classes/product.controller.php';
?>

    <form method="POST" action="">
        <header>
            <div class="container"> 
                <div id="heading">
                    <h1>Product list</h1>
                </div>

                <nav>
                    <ul>
                        <?php
                            if(isset($_SESSION["userid"])){
                        ?>
                            <li> <a href="/product/add"> Add </a> </li>
                            <li> <input type="submit" value="Mass Delete" name="deleteButton" onclick="<?php ProductController::delete();?>"> </li>
                            <li> <input type="submit" value="Log Out" name="logoutbutton" onclick="<?php User::logOut();?>"> </li>
                        <?php
                            }else{
                        ?>
                            <li> <a href = '/register'> Register </a> <li>
                            <li> <a href = '/login'> Log In </a> <li>
                        <?php
                            }
                        ?>
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

<?php
include_once 'footer.php'
?>
