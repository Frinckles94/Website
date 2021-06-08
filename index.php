<?php

include './database/databaseClass.php';
include './database/form.php';

$database = new Database;
$database->connect();

$formValidator = new FormValidator;

$uri = $_SERVER["REQUEST_URI"];

switch($uri){
    case '/':
        require __DIR__."/home.php";
        break;
    case '':
        require __DIR__."/home.php";
        break;
    case '/product/add':
        require __DIR__."/add.php";
        break;
    default:
        http_response_code(404);
        break;

}