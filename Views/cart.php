<h2>Giỏ hàng</h2>
<form action="index.php?act=update_cart" method="post">
    <table border="1" cellpadding="5">
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= number_format($item['price'] * $item['quantity']) ?>đ</td>
            <td>
                <input type="number" name="quantity[<?= $item['product_id'] ?>]" value="<?= $item['quantity'] ?>" min="1" style="width:60px;">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit">Cập nhật số lượng</button>
</form>
<form action="index.php?act=order" method="post">
    <input type="text" name="name" placeholder="Tên người nhận" required><br>
    <input type="text" name="phone" placeholder="SĐT" required><br>
    <textarea name="address" placeholder="Địa chỉ" required></textarea><br>
    <button type="submit">Đặt hàng</button>
</form>
