<?php
include('../includes/header.php');
include('../db.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM authors WHERE author_name LIKE '%$search%' ORDER BY author_name";
$result = $conn->query($sql);
?>
<h2>Author List</h2>
<form method="GET" action="list.php">
    <input type="text" name="search" placeholder="Search authors" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>
<table>
    <thead>
        <tr>
            <th>Author Name</th>
            <th>Books Written</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['author_name']; ?></td>
            <td><?php echo $row['book_numbers']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include('../includes/footer.php'); ?>
