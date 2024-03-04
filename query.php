<?php
$servername = "cssql.seattleu.edu";
$username = "mj-knguyen26";
$password = "mj-knguyen261914";

//Create connection
$conn = mysqli_connect($servername, $username, $password);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>
