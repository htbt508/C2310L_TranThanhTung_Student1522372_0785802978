<?php
include('../includes/header.php');
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $sql = "INSERT INTO books (title, author, category) VALUES ('$title', '$author', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<h2>Add New Book</h2>
<form method="POST" action="add.php">
    <label>Title:</label>
    <input type="text" name="title" required>
    <br>
    <label>Author:</label>
    <input type="text" name="author" required>
    <br>
    <label>Category:</label>
    <input type="text" name="category" required>
    <br>
    <button type="submit">Add Book</button>
</form>
<?php include('../includes/footer.php'); ?>
