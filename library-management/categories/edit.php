<?php
include('../includes/header.php');
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = $conn->query($sql);
    $category = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];

    $sql = "UPDATE categories SET category_name='$category_name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Category updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h2>Edit Category</h2>
<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <label>Category Name:</label>
    <input type="text" name="category_name" value="<?php echo $category['category_name']; ?>" required>
    <br>
    <button type="submit">Update Category</button>
</form>
<?php include('../includes/footer.php'); ?>
