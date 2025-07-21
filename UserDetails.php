<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "Project";

// Step 1: Create database if not exists
$conn = new mysqli($server, $user, $pass);
$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
$conn->close();

// Step 2: Reconnect to the new database
$conn = new mysqli($server, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Create table
$conn->query("CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    phone VARCHAR(20),
    gender VARCHAR(10),
    faculty VARCHAR(50)
)");

// Step 4: Handle form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $phone    = $_POST['phone'];
    $gender   = $_POST['gender'];
    $faculty  = $_POST['faculty'];

    $sql = "INSERT INTO registrations (name, email, password, phone, gender, faculty)
            VALUES ('$name', '$email', '$password', '$phone', '$gender', '$faculty')";
    $conn->query($sql);
}
?>

<!-- HTML Form -->
<form method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Phone: <input type="text" name="phone" required><br>
    Gender:
    <input type="radio" name="gender" value="Male" required>Male
    <input type="radio" name="gender" value="Female" required>Female<br>
    Faculty:
    <select name="faculty" required>
        <option value="Science">Science</option>
        <option value="Management">Management</option>
        <option value="Humanities">Humanities</option>
    </select><br><br>
    <input type="submit" value="Register">
</form>