<?php
include('../includes/header.php'); // Bao gồm header
include('../db.php'); // Kết nối cơ sở dữ liệu

// Nhận giá trị tìm kiếm từ người dùng (nếu có)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Câu truy vấn SQL để lấy danh sách các thể loại sách
$sql = "SELECT * FROM categories WHERE category_name LIKE '%$search%' ORDER BY category_name";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4 text-center">Category List</h2>

            <!-- Form tìm kiếm -->
            <form method="GET" action="list.php" class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search categories" value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>

            <!-- Bảng hiển thị danh sách thể loại -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center">No categories found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); // Bao gồm footer ?>
