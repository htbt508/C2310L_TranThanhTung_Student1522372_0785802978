<?php
include('../includes/header.php');
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $sql = "UPDATE books SET title='$title', author='$author', category='$category' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Book updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h2>Edit Book</h2>
<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?php echo $book['title']; ?>" required>
    <br>
    <label>Author:</label>
    <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
    <br>
    <label>Category:</label>
    <input type="text" name="category" value="<?php echo $book['category']; ?>" required>
    <br>
    <button type="submit">Update Book</button>
</form>
<?php include('../includes/footer.php'); ?>
