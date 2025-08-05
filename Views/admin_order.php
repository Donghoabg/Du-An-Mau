<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="text-center mb-4">📦 Quản lý đơn hàng</h2>

    <table class="table table-bordered table-hover table-striped bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Mã đơn</th>
                <th>Người đặt</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Tổng</th>
                <th>Ngày đặt</th>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <th>Hành động</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $o): ?>
                <tr>
                    <td>#<?= $o['id'] ?></td>
                    <td><?= htmlspecialchars($o['customer_name']) ?></td>
                    <td><?= htmlspecialchars($o['customer_phone']) ?></td>
                    <td><?= htmlspecialchars($o['customer_address']) ?></td>
                    <td><?= number_format($o['total_amount']) ?>đ</td>
                    <td><?= $o['order_date'] ?></td>
                    <td>
                        <a href="index.php?page=deletee&id=<?= $o['id'] ?>" 
                        onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')"
                        style="color:red;">Xóa</a>
                    </td>

                        <td>
                            <a href="order_detail.php?id=<?= $o['id'] ?>" class="btn btn-sm btn-info">Xem chi tiết</a>
                        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="admin.php" class="btn btn-secondary mt-3">⬅ Quay lại trang quản trị</a>
</div>

</body>
</html>
