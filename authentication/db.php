<?php
$host = "localhost";
$dbname = "UserAuthDB"; // Updated database name
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>