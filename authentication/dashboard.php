<?php
session_start();
if (!isset($_SESSION["user"])) {
    die("Access Denied! <a href='login.php'>Login Here</a>");
}
echo "Welcome, " . $_SESSION["user"]["name"] . "!";
?>

<a href="logout.php">Logout</a>