<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập.";
    exit;
}
require_once 'Controllers/ProductController.php';
(new ProductController())->delete();
