<?php
require_once __DIR__ . '/../models/OrderModel.php';

class OrderController {
    public function admin() {
        $model = new OrderModel();
        $orders = $model->getAllOrders();
        include __DIR__ . '/../Views/admin_order.php';

    }
}
