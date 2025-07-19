<h2><?= isset($category) ? 'Sửa' : 'Thêm' ?> danh mục</h2>
<form method="post" action="index.php?page=<?= isset($category) ? 'update_category&id=' . $category['id'] : 'save_category' ?>">
    <label for="name">Tên danh mục:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name'] ?? '') ?>" required>
    <button page=product type="submit">Lưu</button>
    
</form>
<a href="index.php?page=product">Quay lại</a>