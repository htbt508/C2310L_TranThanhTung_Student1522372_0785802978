<?php
include('../includes/header.php');
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM authors WHERE id = $id";
    $result = $conn->query($sql);
    $author = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $book_numbers = $_POST['book_numbers'];

    $sql = "UPDATE authors SET author_name='$author_name', book_numbers='$book_numbers' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Author updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h2>Edit Author</h2>
<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <label>Author Name:</label>
    <input type="text" name="author_name" value="<?php echo $author['author_name']; ?>" required>
    <br>
    <label>Books Written:</label>
    <input type="number" name="book_numbers" value="<?php echo $author['book_numbers']; ?>" required>
    <br>
    <button type="submit">Update Author</button>
</form>
<?php include('../includes/footer.php'); ?>
