<?php
require_once 'Model.php';

class RegisterController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new Database();
    }

    public function register()
{
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $confirm_password = trim($_POST['confirm_password'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        // --- VALIDATION ---
        if (!$username || !$password || !$confirm_password || !$email || !$phone) {
            $error = 'Vui lòng nhập đầy đủ thông tin!';
        } elseif (strlen($username) < 3) {
            $error = 'Tên đăng nhập phải có ít nhất 3 ký tự!';
        } elseif (strlen($password) < 6) {
            $error = 'Mật khẩu phải có ít nhất 6 ký tự!';
        } elseif ($password !== $confirm_password) {
            $error = 'Mật khẩu nhập lại không khớp!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Email không hợp lệ!';
        } elseif (!preg_match('/^[0-9]{8,15}$/', $phone)) {
            $error = 'Số điện thoại không hợp lệ (8-15 số)!';
        } elseif ($this->userModel->CheckUserExists($username)) {
            $error = 'Tên đăng nhập đã tồn tại!';
        } elseif ($this->userModel->isDuplicate($email, $phone)) {
            $error = 'Email hoặc số điện thoại đã tồn tại!';
        } else {
            $id = $this->userModel->register($username, $password, $email, $phone);

            if ($id) {
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header('Location: index.php?page=home');
                exit;
            } else {
                $error = 'Đăng ký thất bại. Vui lòng thử lại!';
            }
        }
    }

    require 'views/register.php';
}


}
