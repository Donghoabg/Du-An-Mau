<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #222;
        padding: 30px;
    }
    .form-container {
        max-width: 500px;
        margin: auto;
        background: #fff;
        padding: 25px 30px;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
    h2 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }
    button[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }
    button[type="submit"]:hover {
        background-color: #555;
    }
    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }
    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <h2><?= isset($category) ? 'Sửa' : 'Thêm' ?> danh mục</h2>
    <form method="post" action="index.php?page=<?= isset($category) ? 'update_category&id=' . $category['id'] : 'save_category' ?>">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name'] ?? '') ?>" required>

        <button type="submit">💾 Lưu</button>

        <?php if (isset($_SESSION['message'])): ?>
            <script>alert('<?= $_SESSION['message'] ?>');</script>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </form>
    <a class="back-link" href="Views/admin.php">⬅ Quay lại</a>
</div>
