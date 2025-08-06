<?php
session_start();
session_unset();    // Xóa toàn bộ biến session
session_destroy();  // Hủy session

// Chuyển hướng về trang chủ (guest)
header("Location: /Du%20AN%20MAU/index.php?page=guest");
exit;
