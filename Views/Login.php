<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #fff; 
            color: #000;             
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            background-color: #f9f9f9; 
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #000;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
            color: #000;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #000;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .dangky{
            margin-top: 20px;
            margin-left: 70px;
            width: 50%;
            padding: 10px;
            background-color: #444444	;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .dangky a{
            color: white;
            text-decoration: none;
            margin-left: 30px;
        }
        input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h3>Đăng nhập</h3>
        <form action="" method="post">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required   >

            <input type="submit" name="login" value="Đăng nhập"><br>
        </form>
        <div class="dangky">
            <a href="?page=register">Đăng ký</a>
        </div>
        </div>

</body>
</html>
