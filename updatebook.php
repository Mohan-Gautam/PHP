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

// Handle update request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $no_of_page = $_POST['no_of_page'];
    $price = $_POST['price'];
    $publish_date = $_POST['publish_date'];
    $isbn = $_POST['isbn'];

    $sql = "UPDATE books SET title='$title', publisher='$publisher', author='$author', edition='$edition', 
            no_of_page='$no_of_page', price='$price', publish_date='$publish_date', isbn='$isbn' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Book updated successfully!</p>";
    } else {
        echo "<p>Error updating book: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book Details</title>
</head>
<body>
    <h2>Update Book</h2>
    <form action="" method="post">
        Book ID: <input type="number" name="id" required><br><br>
        Title: <input type="text" name="title" required><br><br>
        Publisher: <input type="text" name="publisher" required><br><br>
        Author: <input type="text" name="author" required><br><br>
        Edition: <input type="text" name="edition"><br><br>
        No. of Pages: <input type="number" name="no_of_page"><br><br>
        Price: <input type="number" step="0.01" name="price"><br><br>
        Publish Date: <input type="date" name="publish_date"><br><br>
        ISBN: <input type="text" name="isbn"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>