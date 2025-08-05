<?php
require_once 'Models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function list() {
        $users = $this->model->getAllUsers();
        include 'views/users/list.php';
    }

    public function add() {
        include 'views/users/add.php';
    }

    public function saveAdd() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->addUser($_POST['username'], $_POST['password'], $_POST['role']);
            header("Location: index.php?page=list_users");
        }
    }

    public function edit() {
        $user = $this->model->getUserById($_GET['id']);
        include 'views/users/edit.php';
    }

    public function saveEdit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->updateUser($_POST['id'], $_POST['username'], $_POST['password'], $_POST['role']);
            header("Location: index.php?page=list_users");
        }
    }

    public function delete() {
        $this->model->deleteUser($_GET['id']);
        header("Location: index.php?page=list_users");
    }
}
