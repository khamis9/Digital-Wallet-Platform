<?php
$host = "localhost";
$username = "root";
$password = "Hkham!s99";
$database = "digitalwallet";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "connected successfully";
?>
