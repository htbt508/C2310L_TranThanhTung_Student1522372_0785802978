<?php
include('../includes/header.php');
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $book_numbers = $_POST['book_numbers'];

    $sql = "INSERT INTO authors (author_name, book_numbers) VALUES ('$author_name', '$book_numbers')";
    if ($conn->query($sql) === TRUE) {
        echo "New author added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<h2>Add New Author</h2>
<form method="POST" action="add.php">
    <label>Author Name:</label>
    <input type="text" name="author_name" required>
    <br>
    <label>Books Written:</label>
    <input type="number" name="book_numbers" required>
    <br>
    <button type="submit">Add Author</button>
</form>
<?php include('../includes/footer.php'); ?>
