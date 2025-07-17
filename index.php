<?php
session_start();
require_once 'Controller.php';
$run = new Controller();
$page = $_GET['page'] ?? 'Guest';
$id = $_GET['id'] ?? NULL;
switch($page){
    case 'home':
        $run->ControllerHome();
        break;
    case 'Guest':
        $run->ControllerGuest();
        break;
    case 'register':
        $run->ControllerRegister();
        break;
    case 'login':
        $run->ControllerLogin();
        break;
    case 'dienthoai':
        $run->hienThiSanPham();
        break;
    case 'chitiet':
        $run->chitiet($id);
        break;
    case 'chitiet2':
        $run->chitiet2($id);
        break;
    case 'themsanpham':
        $run->themsanpham2($id);
        break;
    case 'themsanpham2':
        $run->themsanpham($id);
        break;
    case 'giohang':
        include 'Views/giohang.php';
        break;
    case 'muahang':
        include 'Views/muahang.php';
        break;
    case 'editproduct':
        $run->EditProductController($id);
        break;
    case 'delete':
        $run->remove($id);
        break;
}