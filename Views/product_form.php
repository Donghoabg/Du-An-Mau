<h2><?= isset($product) ? 'Sửa' : 'Thêm' ?> sản phẩm</h2>
<form method="post" action="index.php?page=<?= isset($product) ? 'update_product&id=' . $product['id'] : 'save_product' ?>">
    <div>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
    </div>
    <div>
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" value="<?= htmlspecialchars($product['price'] ?? '') ?>" required>
    </div>
    <div>
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= (isset($product) && $product['category_id']==$cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button page="" type="submit">Lưu</button>
</form>
<a href="index.php">Quay lại</a>