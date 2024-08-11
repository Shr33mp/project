<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beer_tual";
$port = 3307; // Set the correct port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
    