<?php

$servername = "localhost:3307";  // Usually localhost
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "coffeeshop_db";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>