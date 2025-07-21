<?php
// Start the session
session_start();

// Store session data
$_SESSION["username"] = "Mohan";
$_SESSION["role"] = "Admin";
echo "Session data stored successfully!<br>";

// Retrieve session data
if (isset($_SESSION["username"]) && isset($_SESSION["role"])) {
    echo "Session data retrieved:<br>";
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Role: " . $_SESSION["role"] . "<br>";
} else {
    echo "No session data found!<br>";
}

// Destroy session data
if (isset($_POST['logout'])) {
    session_unset();  // Unset all session variables
    session_destroy(); // Destroy the session
    echo "Session destroyed!";
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>