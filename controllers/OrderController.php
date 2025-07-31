<?php
require_once 'Models/OrderModel.php';

class OrderController {
    public function admin() {
        $model = new OrderModel();
        $orders = $model->getAllOrders();
        include 'views/admin_orders.php';
    }
}
