<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        color: #222;
        padding: 20px;
    }
    a {
        text-decoration: none;
        color: #007bff;
    }
    a:hover {
        text-decoration: underline;
    }
    .category-list {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .category-list ul {
        list-style: none;
        padding: 0;
    }
    .category-list li {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
    }
    .category-list li:last-child {
        border-bottom: none;
    }
    .back-link {
        display: inline-block;
        margin-top: 20px;
        background: #333;
        color: #fff;
        padding: 8px 12px;
        border-radius: 5px;
    }
    .back-link:hover {
        background: #555;
    }
</style>

<div class="category-list">
    <h2>Danh mục sản phẩm</h2>
    <a href="index.php?page=add_category">➕ Thêm danh mục</a>
    <ul>
        <?php foreach ($categories as $cat): ?>
            <li>
                <strong><?= htmlspecialchars($cat['name']) ?></strong>
                | <a href="?page=edit_category&id=<?= $cat['id'] ?>">Sửa</a>
                | <a href="?page=delete_category&id=<?= $cat['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($_SESSION['messagee'])): ?>
        <script>alert("<?= $_SESSION['messagee'] ?>");</script>
        <?php unset($_SESSION['messagee']); ?>
    <?php endif; ?>

    <a class="back-link" href="Views/admin.php">⬅ Quay lại</a>
</div>
