<?php


$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "to_do";

$connection = mysqli_connect($servername, $db_username, $db_password,$db_name);

if(!$connection) {
    die("Connection failed");
}

$message = [];

?>