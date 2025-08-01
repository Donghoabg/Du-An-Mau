<?php session_start(); ?>
<h2>Quản lý đơn hàng</h2>
<table border="1">
    <tr>
        <th>Mã đơn</th>
        <th>Người đặt</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Tổng</th>
        <th>Ngày đặt</th>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <th>Hành động</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($orders as $o): ?>
        <tr>
            <td>#<?= $o['id'] ?></td>
            <td><?= $o['customer_name'] ?></td>
            <td><?= $o['customer_phone'] ?></td>
            <td><?= $o['customer_address'] ?></td>
            <td><?= number_format($o['total_amount']) ?>đ</td>
            <td><?= $o['order_date'] ?></td>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td>
                    <a href="order_detail.php?id=<?= $o['id'] ?>">Xem chi tiết</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
