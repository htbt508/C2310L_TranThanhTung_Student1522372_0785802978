<?php
include('../includes/header.php');
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<h2>Add New Category</h2>
<form method="POST" action="add.php">
    <label>Category Name:</label>
    <input type="text" name="category_name" required>
    <br>
    <button type="submit">Add Category</button>
</form>
<?php include('../includes/footer.php'); ?>
