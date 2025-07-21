<?php
include "auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (registerUser($_POST["email"], $_POST["name"], $_POST["password"])) {
        echo "Registration successful! <a href='login.php'>Login Here</a>";
    } else {
        echo "Error registering user.";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>