<?php
require_once __DIR__ . '/../Models/OrderModel.php';

class OrderController {
    public function admin() {
        $model = new OrderModel();
        $orders = $model->getAllOrders();
        include __DIR__ . '/../Views/admin_order.php';

    }
    public function deletee() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $model = new OrderModel();
            $model->deleteOrder($id);
              header("Location: Views/admin_order.php");
            exit;
        }
    }

    public function index() {
        $model = new OrderModel();
        $orders = $model->getAllOrders();
        include 'views/orders_list.php';
    }

}
