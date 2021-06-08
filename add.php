<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <link rel="shortcut icon" href="#">
        <title> Add product </title>
        <link rel="stylesheet" href="../css/style.css">
        <script type="text/javascript" src="../javascript/dynamicform.js"></script>
        
        
    </head>

    <body>
        <form id="addForm" method="POST">
            <header>
                <div class="container"> 
                    <div id="heading">
                        <h1>Add Product</h1>
                    </div>

                    <nav>
                        <ul> 
                            <li> <input type="submit" value="Submit" id="addButton" name="addButton" onclick="<?php $formValidator->forward();?>"> </li>
                            <li> <a href="../"> Cancel </a> </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <div class="container"> 
            
                <label> SKU </label>
                <input type="text" name="sku" value="<?php $formValidator->inputValue("sku"); ?>">
                <p> <?php $formValidator->errorValue("Sku"); ?> </p>
                <label> Name </label>
                <input type="text" name="name" value="<?php $formValidator->inputValue("name"); ?>">
                <p> <?php $formValidator->errorValue("Name"); ?> </p>
                <label> Price ($) </label>
                <input type="text" name="price" value="<?php $formValidator->inputValue("price") ?>">
                <p> <?php $formValidator->errorValue("Price"); ?> </p>

                <label> Type </label>
                <select name="product" id="selectProduct" onchange="augmentForm()"> 
                    <option value=""></option>
                    <option value="disk">   Disk    </option>
                    <option value="book">   Book    </option>
                    <option value="furniture"> Furniture </option>    
                </select>
                <p> <?php $formValidator->errorValue("Product"); ?> </p>
                <script type="text/javascript">
                    window.onload = function(){    
                        document.getElementById("selectProduct").value = "<?php if(isset($_POST["product"])) echo $_POST["product"];?>";
                        augmentForm();
                    }
                </script>

                <div class = "dynamic" id="disk" hidden>
                    <label> Size (MB)</label>
                    <input type="number" name="size" value="<?php $formValidator->inputValue("size") ?>">
                    <p> <?php $formValidator->errorValue("Size"); ?> </p>
                </div>
                <div class = "dynamic" id="book" hidden>
                    <label> Weight (KG)</label>
                    <input type="text" name="weight" value="<?php $formValidator->inputValue("weight") ?>">
                    <p> <?php $formValidator->errorValue("Weight"); ?> </p>
                </div>
                <div class = "dynamic" id="furniture" hidden>
                    <label> Height (CM) </label>
                    <input type="number" name="height" value="<?php $formValidator->inputValue("height") ?>">
                    <p> <?php $formValidator->errorValue("Height"); ?> </p>
                    <label> Width (CM) </label>
                    <input type="number" name="width" value="<?php $formValidator->inputValue("width") ?>">
                    <p> <?php $formValidator->errorValue("Width"); ?> </p>
                    <label> Length (CM) </label>
                    <input type="number" name="length" value="<?php $formValidator->inputValue("length") ?>">
                    <p> <?php $formValidator->errorValue("Length"); ?> </p>
                </div>
                
                
                 
                
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