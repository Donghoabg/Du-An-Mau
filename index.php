<?php
session_start();
require_once 'controllers/ProductController.php';

$controller = new ProductController();
$action = $_GET['page'] ?? 'guest';

switch ($action) {
    case 'home':
        $controller->showHome();
        break;
    case 'add_category':
        $controller->showAddCategoryForm();
        break;
    case 'save_category':
        $controller->saveCategory();
        break;
    case 'edit_category':
        $controller->showEditCategoryForm();
        break;
    case 'update_category':
        $controller->updateCategory();
        break;
    case 'delete_category':
        $controller->deleteCategory();
        break;
    case 'add_product':
        $controller->showAddProductForm();
        break;
    case 'save_product':
        $controller->saveProduct();
        break;
    case 'edit_product':
        $controller->showEditProductForm();
        break;
    case 'update_product':
        $controller->updateProduct();
        break;
    case 'delete_product':
        $controller->deleteProduct();
        break;
    case 'guest':
        $controller->ControllerGuest();
        break;
    case 'register':
        $controller->ControllerRegister();
        break;
    case 'login':
        $controller->ControllerLogin();
        break;
    case 'giohang':
        include 'Views/giohang.php';
        break;
    case 'muahang':
        include 'Views/muahang.php';
        break;
    case 'product':
        $controller->product();
        break;
    case 'add':
        $controller->add();
        break;
    case 'cart':
        $controller->view();
        break;
    case 'quanlydanhmuc':
        $controller->quanlydanhmuc();
        break;
    

    default:
        

}
?>