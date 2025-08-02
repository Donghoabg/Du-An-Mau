<ul>
    <?php foreach ($categories as $cat): ?>
        <li>
            <a href="?category_id=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a>
            | <a href="?action=edit_category&id=<?= $cat['id'] ?>">Sửa</a>
            | <a href="?action=delete_category&id=<?= $cat['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
        </li>
    <?php endforeach; ?>
</ul>