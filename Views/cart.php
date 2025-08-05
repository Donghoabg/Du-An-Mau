<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
    <h2 class="text-center mb-4">Giỏ hàng</h2>
    <form action="index.php?page=update_cart" method="post">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= number_format($item['price'] * $item['quantity']) ?>đ</td>
                        <td>
                            <input type="number" name="quantity[<?= $item['product_id'] ?>]" value="<?= $item['quantity'] ?>" min="1" class="form-control w-75 mx-auto">
                        </td>
                        <td>
                            <a href="index.php?page=delete_cart&product_id=<?= $item['product_id'] ?>" 
                               onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')" 
                               class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Cập nhật số lượng</button>
        </div>
    </form>

    <div class="mt-4">
        <a href="index.php?page=home" class="btn btn-secondary">← Về trang chủ</a>
    </div>

    <h4 class="mt-5">Thông tin đặt hàng</h4>
    <form action="index.php?page=order" method="post" class="mt-3">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Tên người nhận" required>
        </div>
        <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="SĐT" required>
        </div>
        <div class="mb-3">
            <textarea name="address" class="form-control" rows="3" placeholder="Địa chỉ" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Đặt hàng</button>
    </form>
</div>
