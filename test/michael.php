<?php
$servername = "infrequent.dk";
$username = "mgx_dyrek";
$password = "Ci50oh~8";
$database = "mgx_dyreklinikken";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>