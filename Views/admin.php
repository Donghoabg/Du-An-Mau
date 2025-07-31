<li><a href="admin.php">Quản lý sản phẩm đang có</a></li>'

<li><a href="admin_orders.php">Quản lý đơn hàng đã đặt</a></li>'
<?php
require_once 'db.php';
$pdo = DB::connect();
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Quản lý sản phẩm đang có</h2>
<a href="add_product.php">Thêm sản phẩm mới</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $p): 
        ?>
    <tr>
        
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= number_format($p['price']) ?>đ</td>
        <td><img src="/DU%20AN%20MAU/<?= htmlspecialchars($p['image']) ?>" alt="" width="60px"></td>
        <td>
            <a href="edit_product.php?id=<?= $p['id'] ?>">Sửa</a> |
            <a href="delete_product.php?id=<?= $p['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php">Quay lại trang chủ</a>
