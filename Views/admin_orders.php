<?php
// Kiểm tra đăng nhập qua cookie
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    echo "Bạn không có quyền truy cập.";
    exit;
}

require_once '/controllers/OrderController.php';
(new OrderController())->admin();
?>
