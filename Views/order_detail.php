<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark p-4">

<?php
session_start();
require_once 'db.php';
$pdo = DB::connect();

$order_id = $_GET['id'] ?? 0;

// Lấy thông tin đơn hàng
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Lấy chi tiết đơn hàng
$stmt = $pdo->prepare("SELECT od.*, p.name FROM order_details od 
                       JOIN products p ON od.product_id = p.id 
                       WHERE od.order_id = ?");
$stmt->execute([$order_id]);
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container bg-white shadow rounded p-4">
    <h2 class="mb-4">Chi tiết đơn hàng #<?= $order_id ?></h2>

    <p><strong>Người đặt:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
    <p><strong>SĐT:</strong> <?= htmlspecialchars($order['customer_phone']) ?></p>
    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['customer_address']) ?></p>
    <p><strong>Tổng:</strong> <?= number_format($order['total_amount']) ?>đ</p>

    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $d): ?>
               
            <tr>
                <td><?= htmlspecialchars($d['name']) ?></td>
                <td><?= $d['quantity'] ?></td>
                <td><?= number_format($d['price']) ?>đ</td>
                <td>—</td> <!-- Có thể thêm nút sửa/xoá nếu muốn -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="admin_orders.php" class="btn btn-dark mt-3">← Quay lại</a>
</div>

</body>
</html>
