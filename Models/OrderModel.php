<?php
require_once 'db.php';

class OrderModel {
    private $pdo;

    public function __construct() {
        $this->pdo = DB::connect();
    }

    public function createOrder($user_id, $name, $phone, $address, $total) {
        $stmt = $this->pdo->prepare("INSERT INTO orders (user_id, customer_name, customer_phone, customer_address, total_amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $name, $phone, $address, $total]);
        return $this->pdo->lastInsertId();
    }

    public function addOrderDetail($order_id, $product_id, $quantity, $price) {
        $stmt = $this->pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $product_id, $quantity, $price]);
    }

    public function getAllOrders() {
        $stmt = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
