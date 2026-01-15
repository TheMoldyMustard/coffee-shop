<?php

$servername = "localhost:3307"; // XAMPP uses 3307 port
$username = "root";        
$password = "";            
$dbname = "coffeeshop_db";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>