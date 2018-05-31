<?php
require("constants.php");
 
//1. create database connection
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(mysqli_connect_errno()) {
echo "Database connection failed" . mysqli_connect_error();
}


 
?>