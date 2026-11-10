<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_borrowing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cheeck connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>