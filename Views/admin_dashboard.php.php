<?php
session_start();
require_once './Model.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: Login.php");
    exit();
}

$model = new Model();
$products = $model->getAllProducts();
$categories = $model->getAllCategories();
$users = $model->getAllUsers();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị Admin</title>
    <link rel="stylesheet" href="views/css.css?v=1">
    <style>
        body {
            font-family: Arial;
        }
        .admin-header {
            background-color: #222;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .admin-menu {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px;
        }
        .admin-menu a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .admin-menu a:hover {
            background-color: #0056b3;
        }
        h2 {
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>Trang quản trị Admin</h1>
        <p>Xin chào: <?= htmlspecialchars($_SESSION['username']) ?> | <a href="?page=Guest" style="color:yellow">Đăng xuất</a></p>
    </div>

    <div class="admin-menu">
        <a href="#products">Sản phẩm</a>
        <a href="#categories">Danh mục</a>
        <a href="#users">Người dùng</a>
    </div>

    <div class="content">
        <!-- Quản lý sản phẩm -->
        <h2 id="products">Quản lý sản phẩm</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Giá mới</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><img src="<?= $p['image'] ?>" width="60"></td>
                    <td><?= number_format($p['gia']) ?></td>
                    <td><?= $p['giamoi'] ? number_format($p['giamoi']) : '---' ?></td>
                    <td><?= $model->getCategoryName($p['category_id']) ?></td>
                    <td><a href="#">Sửa</a> | <a href="#" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Quản lý danh mục -->
        <h2 id="categories">Quản lý danh mục</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($categories as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['name']) ?></td>
                    <td><a href="#">Sửa</a> | <a href="#" onclick="return confirm('Xóa danh mục này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2 id="users">Quản lý người dùng</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['username']) ?></td>
                    <td><?= $u['role'] ?></td>
                    <td><a href="#" onclick="return confirm('Xóa người dùng này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
