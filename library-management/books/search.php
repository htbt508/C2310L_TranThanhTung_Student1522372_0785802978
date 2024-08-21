<?php
include('../includes/header.php');
include('../db.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM books WHERE title LIKE '%$search%'";
$result = $conn->query($sql);
?>
<h2>Search Results</h2>
<form method="GET" action="search.php">
    <input type="text" name="search" placeholder="Search books" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Publisher</th>
                <th>Year</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php
                    $author_id = $row['author_id'];
                    $author_sql = "SELECT author_name FROM authors WHERE id = $author_id";
                    $author_result = $conn->query($author_sql);
                    $author = $author_result->fetch_assoc();
                    echo $author['author_name'];
                ?></td>
                <td><?php
                    $category_id = $row['category_id'];
                    $category_sql = "SELECT category_name FROM categories WHERE id = $category_id";
                    $category_result = $conn->query($category_sql);
                    $category = $category_result->fetch_assoc();
                    echo $category['category_name'];
                ?></td>
                <td><?php echo $row['publisher']; ?></td>
                <td><?php echo $row['publish_year']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>

<?php include('../includes/footer.php'); ?>
