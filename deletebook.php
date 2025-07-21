<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bookdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM books WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Book deleted successfully!</p>";
    } else {
        echo "<p>Error deleting book: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
</head>
<body>
    <h2>Delete a Book</h2>
    <form action="" method="post">
        Book ID: <input type="number" name="id" required><br><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>