<?php 
$servername = "localhost";
$username = "er";
$password = "er";
$dbname = "er";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
