<?php



?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <style>
        * { box-sizing: border-box; }
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .register-container {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        h2 { margin-bottom: 20px; }
        label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #000;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #333;
        }
        .login-link {
            display: block;
            margin-top: 15px;
            color: #000;
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Đăng ký</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        

        <form method="POST" action="">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" required>

            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <input type="submit" name="register" value="Đăng ký">
        </form>
        <a class="login-link" href="?page=login">Đã có tài khoản? Đăng nhập</a>
        
    </div>


</body>
</html>
