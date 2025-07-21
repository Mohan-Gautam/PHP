<?php
session_start();
include "db.php";

// Register User
function registerUser($email, $name, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO registrations (email, name, password) VALUES ('$email', '$name', '$hashedPassword')";
    return $conn->query($sql);
}

// Login User
function loginUser($email, $password) {
    global $conn;
    $sql = "SELECT id, name, password FROM registrations WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = ["id" => $user["id"], "name" => $user["name"]];

            if (isset($_POST['remember'])) {
                setcookie("user_email", $email, time() + (86400 * 7), "/"); // 7-day cookie
            }
            return true;
        }
    }
    return false;
}

// Logout
function logoutUser() {
    session_destroy();
}
?>