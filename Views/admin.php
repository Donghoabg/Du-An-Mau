<?php
require_once 'db.php';
$pdo = DB::connect();
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Quản lý sản phẩm đang có</h2>

    <div class="mb-3">
        <a class="btn btn-primary me-2" href="add_product.php">Thêm sản phẩm mới</a>
        <a class="btn btn-secondary me-2" href="../index.php?page=quanlydanhmuc">Quản lý danh mục</a>
        <a class="btn btn-secondary me-2" href="../index.php?page=list_users">Quản lý người dùng</a>
        <a class="btn btn-info" href="admin_orders.php">Quản lý đơn hàng đã đặt</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td><?= number_format($p['price']) ?>đ</td>
                <td><img src="/DU%20AN%20MAU/<?= htmlspecialchars($p['image']) ?>" width="60"></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="edit_product.php?id=<?= $p['id'] ?>">Sửa</a>
                    <a class="btn btn-danger btn-sm" href="delete_product.php?id=<?= $p['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a class="btn btn-outline-secondary mt-3" href="index.php?page=guest">Quay lại trang chủ</a>
</div>
