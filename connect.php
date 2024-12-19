<?php
// Database connection
$dbhost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "crud";

// Establish connection
$conn = mysqli_connect($dbhost, $dbUser, $dbPass, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

