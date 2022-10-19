<?php

include './classes/database.class.php';
include './classes/form.php';
include './classes/register.controller.php';

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
    case '/register':
        require __DIR__."/register.php";
        break;
    case '/login':
        require __DIR__/"/register.php";
        break;
    case '/profile':
        require __DIR__."/profile.php";
        break;
    case '/product/add':
        require __DIR__."/add.php";
        break;
    default:
        http_response_code(404);
        break;

}