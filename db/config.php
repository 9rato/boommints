<?php
$servername = "localhost";
$username = "boommint_pi";
$password = "boommint_pi";
$database = "boommint_pi";

// Declare $conn as a global variable
global $conn;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>