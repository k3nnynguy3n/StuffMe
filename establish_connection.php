<?php
$servername = "cssql.seattleu.edu";
$username = "mj-lebia";
$password = "mj-lebia1680";


// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn){
    die("Connection failed: " . 
    mysqli_connect_error());
}
echo "Connected successfully";



?>