<?php
include_once 'header.php';
include_once './classes/register.controller.php';

$registerController = new RegisterController;
?>
    <div class= "container">
        <form method="POST" class= "auth">
            <input type= "text" name="name" placeholder="Name">
            <input type= "text" name="surname" placeholder="Surname">
            <input type= "text" name="username" placeholder="User Name">
            <input type= "text" name="email" placeholder="Email">
            <input type= "password" name="password" placeholder="Password">
            <input type= "password" name="password2" placeholder="Repeat Password">
            <input type="submit" value="Submit" name="RegButton" onclick="<?php $registerController->validate();?>">
        </form>
    </div>
<?php
include_once 'footer.php'
?>