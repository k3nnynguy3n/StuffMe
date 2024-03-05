<?php

// MySQL database configuration
$servername = "cssql.seattleu.edu";  
$username = "mj-knguyen26";    
$password = "mj-knguyen261914";    
$database = "mj-knguyen26";       

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>