<?php
require_once(__DIR__ . '/../Model.php');
class ProductController {
    

    public function ControllerGuest() {
        include 'Views/Guest.php';
    }

    public function ControllerRegister() {
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $confirm = $_POST["confirm_password"];
        $db = new Database();

        // Kiểm tra điều kiện đầu vào
        if (!preg_match("/[a-zA-Z]/", $username)) {
            $error = "Tên phải có ít nhất 1 chữ cái.";
        } elseif (strlen($password) < 4) {
            $error = "Mật khẩu phải có ít nhất 4 ký tự.";
        } elseif ($password !== $confirm) {
            $error = "Mật khẩu nhập lại không khớp.";
        } elseif ($db->CheckUserExists($username)) {
            $error = "Tài khoản đã tồn tại.";
        } else {
            $db->RegisterModel($username, $password);
            header("Location: index.php?page=login");
            exit;
        }
    }

    include 'Views/Register.php';
    }



    public function ControllerLogin() {
    include 'Views/Login.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = new Database();

        // Lấy thông tin người dùng (gồm role) từ LoginModel
        $user = $login->LoginModel($username, $password);

        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // lưu role vào session

            if ($user['role'] === 'admin') {
                header('Location: Views/admin.php');
            } else {
                header('Location: index.php?page=home');
            }
            exit();
        } else {
            echo "Sai tên đăng nhập hoặc mật khẩu";
        }
    }
}

    private $model;

    public function __construct() {
        $this->model = new Database();
    }
    public function showHome() {
        $model = new Database();
        $productss = $model->getSaleProducts();

        $limit = 10;
        $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;
        $products = $model->getProducts($limit, $offset);
        $total = $model->getTotalProducts();
        $totalPages = ceil($total / $limit);
        include __DIR__ . '/../Views/home.php';
        exit;
    }

public function product() {
    $sort = $_GET['sort'] ?? '';
    $category_id = $_GET['category_id'] ?? 0;
    $keyword = $_GET['keyword'] ?? '';
    $min_price = $_GET['min_price'] ?? null;
    $max_price = $_GET['max_price'] ?? null;

    $limit = 8;
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    $model = new Database();
    $result = $model->searchProducts($category_id, $keyword, $min_price, $max_price, $sort, $limit, $offset);
    $products = $result['products'];
    $total = $result['total'];
    $totalPages = ceil($total / $limit);

    $categories = $model->getAllCategories();

    // Truyền đúng biến sang view
    include __DIR__ . '/../Views/product.php';
}
    public function quanlydanhmuc() {
        $model = new Database();
        $categories = $model->getAllCategories();

        include __DIR__ . '/../Views/quanlydanhmuc.php';

    }

    

    public function showAddCategoryForm() {
        include __DIR__ . '/../views/category_form.php';
    }

    public function saveCategory() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->model->addCategory($_POST['name']);

        // Lưu thông báo vào session
        $_SESSION['message'] = 'Thêm danh mục thành công!';

        // Chuyển hướng về lại trang form
        header("Location: index.php?page=add_category");
        exit;
    }
}


    public function showEditCategoryForm() {
        $id = $_GET['id'];
        $category = $this->model->getCategoryById($id);
        include __DIR__ . '/../views/category_form.php';
    }

    public function updateCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->updateCategory($_GET['id'], $_POST['name']);
            header("Location: index.php?page=product");

            exit;
        }
    }

    public function deleteCategory() {
        $this->model->deleteCategory($_GET['id']);
        $_SESSION['messagee'] = 'Xóa thành công';
        header( "Location: index.php?page=quanlydanhmuc");
        exit;
    }

    public function showAddProductForm() {
        $categories = $this->model->getAllCategories();
        include __DIR__ . '/../views/product_form.php';
    }

    public function saveProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->addProduct($_POST['name'], $_POST['price'], $_POST['category_id']);
            header("Location: index.php");
            exit;
        }
    }

    public function showEditProductForm() {
        $categories = $this->model->getAllCategories();
        $product = $this->model->getProductById($_GET['id']);
        include __DIR__ . '/../views/product_form.php';
    }

    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->updateProduct($_GET['id'], $_POST['name'], $_POST['price'], $_POST['category_id']);
            header("Location: index.php");
            exit;
        }
    }

    public function deleteProduct() {
        $this->model->deleteProduct($_GET['id']);
        header("Location: index.php");
        exit;
    }

    public function showDetail() {
        $product = $this->model->getProductById($_GET['id']);
        include __DIR__ . '/../views/detail.php';
    }
    public function delete() {
        $id = $_GET['id'] ?? 0;
        $model = new Database();
        $model->delete($id);
        header('Location: admin.php');
        exit;
    }
    public function add() {
        $this->model->addToCart($_SESSION['id'], $_GET['id'], 1); // user_id = 1
        echo "<script>
        alert('Đã thêm vào giỏ hàng!');
        window.location.href = 'index.php?page=home';
    </script>";
    }
    public function view() {
        $items = $this->model->getCartItems($_SESSION['id']); // user_id = 1 tạm thời
        include 'views/cart.php';
    }
    public function deleteCartItem() {
    session_start();
    $user_id = $_SESSION['id'] ?? null;
    $product_id = $_GET['product_id'] ?? null;

    if ($user_id && $product_id) {
        $model = new Database();
        $model->deleteItem($user_id, $product_id);
    }

    // Chuyển về lại trang giỏ hàng sau khi xóa
    header("Location: index.php?page=cart");
    exit;
    }
    public function update_cart() {
        $cartModel = new Database();
        if (isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $product_id => $qty) {
                $cartModel->updateQuantity($_SESSION['id'], $product_id, $qty);
            }
        }
        header('Location: index.php?page=cart');
        exit;
    }
    public function order() {
        $cartModel = new Database();
        $orderModel = new OrderModel();
        $user_id = $_SESSION['id'];
        $items = $cartModel->getCartItems($user_id);

        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order_id = $orderModel->createOrder($user_id, $_POST['name'], $_POST['phone'], $_POST['address'], $total);

        foreach ($items as $item) {
            $orderModel->addOrderDetail($order_id, $item['product_id'], $item['quantity'], $item['price']);
        }

        $cartModel->clearCart($_SESSION['id']);
        echo '
            <div style="text-align: center; margin-top: 50px;">
                <h2 style="color: green; font-size: 24px; margin-bottom: 20px;">🎉 Cảm ơn bạn đã đặt hàng!</h2>
                <a href="index.php?page=home" 
                style="display: inline-block; padding: 12px 24px; background-color: #007bff; color: white; text-decoration: none; border-radius: 8px; font-size: 16px;">
                    Quay về trang chủ
                </a>
            </div>
        ';
    }
    public function chitiet() {
        if (!isset($_GET['id'])) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }

        $id = intval($_GET['id']);
        $model = new Database();
        $product = $model->getProductById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            return;
        }

        include 'views/chitiet.php';
    }
}
?>
