<?php
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "b1f5cea20e4578";
$password = "614275e25653f11";
$db_name = "heroku_2e14613f67563f3";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "mysqli Connected successfully";
?>