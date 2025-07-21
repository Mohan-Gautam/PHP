<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = ($_POST['password']);

    $sql = "SELECT id, name FROM registrations WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;

        if (isset($_POST['remember'])) {
            setcookie("user_email", $email, time() + (86400 * 7), "/"); // 7-day cookie
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Incorrect email or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red'>{$error}</p>"; ?>
    
    <form method="post">
        Email: <input type="email" name="email" required value="<?php echo $_COOKIE['user_email'] ?? ''; ?>"><br>
        Password: <input type="password" name="password" required><br>
        <label><input type="checkbox" name="remember"> Remember me</label><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>