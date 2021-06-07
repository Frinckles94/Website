<?php
include "./database/form.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
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
                            <li> <input type="submit" value="Submit" id="addButton" name="addButton"> </li>
                            <li> <a href="../"> Cancel </a> </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <div class="container"> 
            
                <label> SKU </label>
                <input type="text" name="sku" value="<?php inputValue("sku"); ?>">
                <p> <?php errorValue("Sku"); ?> </p>
                <label> Name </label>
                <input type="text" name="name" value="<?php inputValue("name"); ?>">
                <p> <?php errorValue("Name"); ?> </p>
                <label> Price ($) </label>
                <input type="number" name="price" value="<?php inputValue("price") ?>">
                <p> <?php errorValue("Price"); ?> </p>

                <label> Type </label>
                <select name="product" id="selectProduct" onchange="augmentForm()"> 
                    <option value=""></option>
                    <option value="disk">   Disk    </option>
                    <option value="book">   Book    </option>
                    <option value="furniture"> Furniture </option>    
                </select>
                <p> <?php errorValue("Product"); ?> </p>

                <script type="text/javascript">
                    window.onload = function(){    
                        document.getElementById("selectProduct").value = "<?php echo $_POST["product"];?>";
                        augmentForm();
                    }
                </script>

                <div class = "dynamic" id="disk" hidden>
                    <label> Size (MB)</label>
                    <input type="number" name="size" value="<?php inputValue("size") ?>">
                    <p> <?php errorValue("Size"); ?> </p>
                </div>
                <div class = "dynamic" id="book" hidden>
                    <label> Weight (KG)</label>
                    <input type="number" name="weight" value="<?php inputValue("weight") ?>">
                    <p> <?php errorValue("Weight"); ?> </p>
                </div>
                <div class = "dynamic" id="furniture" hidden>
                    <label> Height (CM) </label>
                    <input type="number" name="height" value="<?php inputValue("height") ?>">
                    <p> <?php errorValue("Height"); ?> </p>
                    <label> Width (CM) </label>
                    <input type="number" name="width" value="<?php inputValue("width") ?>">
                    <p> <?php errorValue("Width"); ?> </p>
                    <label> Length (CM) </label>
                    <input type="number" name="length" value="<?php inputValue("length") ?>">
                    <p> <?php errorValue("Length"); ?> </p>
                </div>
                
                
                 
                
            </div>
        </form>
       
       
        

        <footer>
            <p> Scandiweb Test Assignment </p>
        </footer>


    </body>

</html>

