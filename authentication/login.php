<?php
include "auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (loginUser($_POST["email"], $_POST["password"])) {
        echo "Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
    } else {
        echo "Invalid email or password.";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required value="<?php echo $_COOKIE['user_email'] ?? ''; ?>"><br>
    Password: <input type="password" name="password" required><br>
    <label><input type="checkbox" name="remember"> Remember me</label><br><br>
    <button type="submit">Login</button>
</form>