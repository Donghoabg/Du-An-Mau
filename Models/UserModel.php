<?php
require_once 'Views/db.php';

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = DB::connect();
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function addUser($username, $password, $role) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), $role]);
    }

    public function updateUser($id, $username, $password, $role) {
        $query = "UPDATE users SET username = ?, role = ?";
        $params = [$username, $role];

        if (!empty($password)) {
            $query .= ", password = ?";
            $params[] = password_hash($password, PASSWORD_DEFAULT);
        }

        $query .= " WHERE id = ?";
        $params[] = $id;

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
