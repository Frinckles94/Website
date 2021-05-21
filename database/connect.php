<?php
$user = "root";
$password = "";
$host = "localhost:3308";
$dbname = "test";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connection failed");
}