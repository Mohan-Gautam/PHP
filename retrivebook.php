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

// Fetch book details
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
</head>
<body>
    <h2>Book Details</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>No. of Pages</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>ISBN</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['publisher']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['edition']}</td>
                        <td>{$row['no_of_page']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['publish_date']}</td>
                        <td>{$row['isbn']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No books found</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
$conn->close();
?>