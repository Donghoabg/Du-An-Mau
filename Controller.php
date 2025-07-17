<?php
require_once 'Model.php';

class Controller {
    public function ControllerHome() {
        $products = new Database();
        $images = $products->ProductsSaleModel();
        $newproduct = $products->ProductNew();
        include 'Views/home.php';
    }

    public function ControllerGuest() {
        include 'Views/Guest.php';
    }

    public function ControllerRegister() {
        include 'Views/Register.php';
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $register = new Database();
            $register->RegisterModel($username, $password);
            header('Location: index.php?page=login');
        }
        echo "Thất bại";
    }

    public function ControllerLogin() {
        include 'Views/Login.php';
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = new Database();
            
            if ($login->LoginModel($username, $password) === true) {
                session_start();
                $_SESSION['username'] = $username;
                header('Location: index.php?page=home');
                exit();
            } else {
                echo "Sai tên đăng nhập hoặc mật khẩu";
            }
        }
    }

    public function hienThiSanPham() {
        $modell = new Database();

        $brand = isset($_POST['brand']) ? $_POST['brand'] : [];
        $min = isset($_POST['min']) ? $_POST['min'] : '';
        $max = isset($_POST['max']) ? $_POST['max'] : '';

        // Phân trang
        $page = isset($_POST['page']) ? max(1, (int)$_POST['page']) : 1;
        $limit = 8;
        $offset = ($page - 1) * $limit;

        $products = $modell->getFilteredProducts($brand, $min, $max, $offset, $limit);
        $total = $modell->countFilteredProducts($brand, $min, $max);
        $pages = ceil($total / $limit);

        include 'Views/dienthoai/mobliehome.php';
    }
    public function chitiet($id){
        $xylysanpham = new Database();
        $product = $xylysanpham->laysanphamtheoid($id);
        if($product){
            include 'Views/chitiet.php';
        }
    }
    public function chitiet2($id){
        $xylysanpham = new Database();
        $product = $xylysanpham->laysanphamtheoid2($id);
        if($product){
            include 'Views/chitiet2.php';
        }
    }
    public function themsanpham($id){
        $xulysanpham = new Database();
        $sp = $xulysanpham->laysanphamtheoid($id);
        
        if (isset($_SESSION['cartt'][$id])) {
            $_SESSION['cartt'][$id]['soluong'] += 1;
        } else {
            $_SESSION['cartt'][$id] = $sp;
            $_SESSION['cartt'][$id]['soluong'] = 1;
        }
    
        header('Location: ?page=giohang');
    }
    public function themsanpham2($id){
        $xulysanpham = new Database();
        $sp = $xulysanpham->laysanphamtheoid2($id);
        
        if (isset($_SESSION['cartt'][$id])) {
            $_SESSION['cartt'][$id]['soluong'] += 1;
        } else {
            $_SESSION['cartt'][$id] = $sp;
            $_SESSION['cartt'][$id]['soluong'] = 1;
        }
    
        header('Location: ?page=giohang');
    }
    function EditProductController($id){
        $Editmodel = new Database();
        $EditProduct = $Editmodel->laysanphamtheoid($id);
        if($EditProduct){
            include 'Views/editproduct.php';
        }
        if(isset($_POST['edit'])){
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $giamoi = $_POST['gia'] ?? '';
            $image = $_FILES['image'] ?? null;
            $mota = $_POST['mota'] ?? '';
            if (!empty($_FILES['image']['name'])) {
                $target_dir = "images/"; 
                $image = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $image);
            } else {
                
            }
            $Editmodel->update($id, $name, $giamoi, $image, $mota);
            header('Location: ?page=home ');
        }
    }
    public function remove(){
        $id = $_GET['id'] ?? 0;
        $modelStudent = new Database();
        $modelStudent->delete($id);
        $message = 'Xóa thành công';
        header('Location: ?page=home');
    }
}
?>
