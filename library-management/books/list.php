<?php
include('../includes/header.php');
include('../db.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'title';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM books WHERE title LIKE '%$search%' ORDER BY $order LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
?>
<h2>Book List</h2>
<form method="GET" action="list.php">
    <input type="text" name="search" placeholder="Search books" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>
<table>
    <thead>
        <tr>
            <th><a href="?order=title">Title</a></th>
            <th><a href="?order=author">Author</a></th>
            <th><a href="?order=category">Category</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
$sql = "SELECT COUNT(id) AS total FROM books WHERE title LIKE '%$search%'";
$total = $conn->query($sql)->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
include('../includes/footer.php');
?>
