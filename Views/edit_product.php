<?php
session_start();

require_once 'db.php';
$pdo = DB::connect();
$id = $_GET['id'] ?? 0;

// Lấy sản phẩm cần sửa
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Nếu có file mới được chọn
    $image_name = $product['image']; // giữ nguyên ảnh cũ
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $image_name = 'images/' . basename($_FILES['image']['name']);
        $target_path = $upload_dir . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
    }

    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $price, $image_name, $id]);
    header('Location: admin.php');
    exit;
}
?>
<h2>Sửa sản phẩm</h2>
<form method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>
    Giá: <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br>
    Ảnh hiện tại: <img src="uploads/<?= htmlspecialchars($product['image']) ?>" width="100"><br>
    Ảnh mới: <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Lưu</button>
</form>
<a href="admin.php">Quay lại</a>
<style>
    
    body {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #f8f8f8;
    }

    h2 {
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    form input[type="text"],
    form input[type="number"],
    form input[type="file"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form img {
        margin: 10px 0;
        border: 1px solid #ccc;
        padding: 5px;
        background: #fff;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    a {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

