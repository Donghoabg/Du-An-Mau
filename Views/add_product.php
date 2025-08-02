<?php
require_once 'db.php';

// Kiểm tra đăng nhập qua cookie
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    echo "Bạn không có quyền truy cập.";
    exit;
}

$pdo = DB::connect();

// Kiểm tra người dùng có tồn tại và là admin không
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1");
$stmt->execute([$_COOKIE['username'], $_COOKIE['password']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || $user['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập.";
    exit;
}

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

<h2>Thêm sản phẩm mới</h2>
<form method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="name" required><br>
    Giá: <input type="number" name="price" required><br>

    <div>
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>">
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    Ảnh: <input type="file" name="image" accept="image/*" required><br>
    Mô tả: <textarea name="mota" required></textarea><br>
    <button type="submit">Thêm</button>
</form>

<a href="admin.php">Quay lại</a>
