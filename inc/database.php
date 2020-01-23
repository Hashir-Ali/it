<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "intellitech";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$connDB = mysqli_select_db($conn,'intellitech');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
