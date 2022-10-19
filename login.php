<?php
include_once 'header.php';
include_once './classes/login.controller.php';
$loginController = new LoginController;
?>

<div class= "container">
    <form method="POST" class= "auth">
        <input type= "text" name="log" placeholder="User Name">
        <input type= "password" name="pass" placeholder="Password">
        <button type= "submit" name="logInB" onclick="<?php $loginController->validate();?>"> Log in </button>
    </form>
</div>

<?php
include_once 'footer.php'
?>