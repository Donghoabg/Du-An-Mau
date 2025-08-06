<?php
require_once 'db.php';

// Kiểm tra đăng nhập qua cookie


$pdo = DB::connect();

// Kiểm tra người dùng có tồn tại và là admin không
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1");
$stmt->execute([$_COOKIE['username'], $_COOKIE['password']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);



// Lấy danh sách danh mục để hiển thị trong form
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Xử lý thêm sản phẩm nếu có gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $category_id = $_POST['category_id'] ?? 0;
    $mota = $_POST['mota'] ?? '';

    $image_name = ''; // Mặc định rỗng
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/images/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $filename = basename($_FILES['image']['name']);
        $target_path = $upload_dir . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image_name = 'images/' . $filename; // Lưu đường dẫn tương đối để show ảnh
        }
    }

    // Chèn sản phẩm mới vào CSDL
    $stmt = $pdo->prepare("INSERT INTO products (name, price, category_id, image, mota) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $price, $category_id, $image_name, $mota]);

    // Chuyển hướng sau khi thêm xong
    header('Location: admin.php');
    exit;
}
?>
<div class="form-container">
    <h2>Thêm sản phẩm mới</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" required>

        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>">
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="image">Ảnh:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="mota">Mô tả:</label>
        <textarea id="mota" name="mota" required></textarea>

        <button type="submit">Thêm</button>
    </form>

    <a href="admin.php">Quay lại</a>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        height: 100vh;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        width: 450px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form label {
        margin: 10px 0 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="number"],
    form input[type="file"],
    form select,
    form textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    form textarea {
        resize: vertical;
        height: 100px;
    }

    button {
        padding: 12px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

