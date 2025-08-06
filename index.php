<?php
session_start();
require_once 'Model.php';
require_once 'controllers/Login.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/OrderController.php';
$database = new Database();
$login = new RegisterController($database);
$orderController = new OrderController();
$controller = new ProductController();
$ctrl = new UserController();
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
        
        $login->register();
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
    case 'order':
        $controller->order();
        break;
    case 'update_cart':
        $controller->update_cart();
        break;
    case 'delete_cart':
        $controller->deleteCartItem();
        break;
    case 'quanlydanhmuc':
        $controller->quanlydanhmuc();
        break;
    case 'list_users': $ctrl->list(); 
        break;
    case 'add_user': $ctrl->add(); 
        break;
    case 'save_add_user': $ctrl->saveAdd(); 
            break;
    case 'edit_user': $ctrl->edit(); 
        break;
    case 'save_edit_user': $ctrl->saveEdit(); 
        break;
    case 'delete_user': $ctrl->delete(); 
        break;
    case 'deletee':
        $orderController->deletee();
        break;
    case 'chitiet';
        $controller->chitiet();
        break;  
    

    default:
        

}
?>