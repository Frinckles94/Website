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
                        <?php if(isset($_SESSION["userid"])){ ?>
                        <?php if($_SESSION["isAdmin"] == 1){ ?>
                            <li> <a href="/product/add"> Add </a> </li>
                            <li> <input type="submit" value="Mass Delete" name="deleteButton" onclick="<?php ProductController::delete();?>"> </li>
                            <!-- Order status - possibly -->
                        <?php }else{ ?>
                            <li> <a id="profileButton" href="/profile"> <?php echo $_SESSION["name"] ?> </a> </li>
                            <li> <a id="cartButton" href="/cart"> Cart </a> </li>
                        <?php } ?>
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
                Disk::show();
                Book::show();
                Furniture::show();
            ?>
            
            
        </div>
        
    </form>

<?php
include_once 'footer.php'
?>
