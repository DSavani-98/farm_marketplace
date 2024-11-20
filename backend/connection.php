<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "farm_marketplace";
$conn = new mysqli($host, $username, $password, $dbname);
// Check if the connection was successful

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
   } 
?>
