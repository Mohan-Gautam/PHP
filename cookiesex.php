<?php
// Store cookie data (expires in 1 hour)
setcookie("username", "Mohan", time() + 3600, "/");
setcookie("role", "Admin", time() + 3600, "/");

// Retrieve cookie data
if (isset($_COOKIE["username"]) && isset($_COOKIE["role"])) {
    echo "Username: " . $_COOKIE["username"] . "<br>";
    echo "Role: " . $_COOKIE["role"] . "<br>";
} else {
    echo "Cookies are not set!<br>";
}

// Destroy cookie data
if (isset($_POST['logout'])) {
    setcookie("username", "", time() - 3600, "/");
    setcookie("role", "", time() - 3600, "/");
    echo "Cookies deleted!";
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