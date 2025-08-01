<?php
require_once 'db.php';
// Kiểm tra đăng nhập qua cookie
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    echo "Bạn không có quyền truy cập.";
    exit;
}
$pdo = DB::connect();
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1");
$stmt->execute([$_COOKIE['username'], $_COOKIE['password']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user || $user['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập.";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $mota = $_POST['mota'];

    // Xử lý upload ảnh
    $image_name = 'images/' . basename($_FILES['image']['name']);
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/images/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $image_name = 'images/' . basename($_FILES['image']['name']); // ✅ Thêm images/
        $target_path = $upload_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
    }


    $stmt = $pdo->prepare("INSERT INTO products (name, price, category_id, image, mota) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $price, $category_id, $image_name, $mota]);
    header('Location: admin.php');
    exit;
}
?>
<h2>Thêm sản phẩm mới</h2>
<form method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="name" required><br>
    Giá: <input type="number" name="price" required><br>
    Danh mục (category_id): <input type="number" name="category_id" required><br>
    Ảnh: <input type="file" name="image" accept="image/*" required><br>
    Mô tả: <textarea name="mota" required></textarea><br>
    <button type="submit">Thêm</button>
</form>
<a href="admin.php">Quay lại</a>
