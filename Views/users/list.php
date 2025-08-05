<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">
        <h2 class="mb-4 text-primary">Danh sách người dùng</h2>

        <a href="index.php?page=add_user" class="btn btn-success mb-3">➕ Thêm người dùng</a>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['username']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td><?= $u['created_at'] ?></td>
                    <td>
                        <a href="index.php?page=edit_user&id=<?= $u['id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="index.php?page=delete_user&id=<?= $u['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xoá người dùng này?')">Xoá</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="Views/admin.php" class="btn btn-secondary mt-3">⬅ Quay lại trang admin</a>
    </div>
</body>
</html>
