<?php

$user = "root";
$pass = "";
$host = "localhost";
$dbdb = "db_weschool";
    
$conn = new mysqli($host, $user, $pass, $dbdb);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>