<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <style>
        /* giữ nguyên style cũ */
        * { box-sizing: border-box; }
        body { background-color: #fff; color: #000; font-family: Arial; margin:0; padding:0; }
        .register-container { width:350px; margin:100px auto; padding:30px; background:#f9f9f9; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
        h2 { margin-bottom:20px; }
        label { display:block; text-align:left; margin-bottom:5px; font-weight:bold; }
        input[type="text"],input[type="password"],input[type="email"] { width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; }
        input[type="submit"] { width:100%; padding:10px; background:#000; color:#fff; border:none; border-radius:5px; font-weight:bold; cursor:pointer; }
        input[type="submit"]:hover { background:#333; }
        .error { color:red; margin-bottom:10px; }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Đăng ký</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password">

            <label for="confirm_password">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" id="confirm_password">

            <input type="submit" value="Đăng ký">
        </form>
        <a href="?page=login">Đăng nhập</a>
    </div>
</body>
</html>
