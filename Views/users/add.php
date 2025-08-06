<h2 style="text-align:center;">Thêm người dùng</h2>

<style>
    .form-container {
        max-width: 400px;
        margin: 30px auto;
        padding: 20px;
        background: #f5f5f5;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #0056b3;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .back-link:hover {
        text-decoration: underline;
        color: #0056b3;
    }
</style>

<form class="form-container" method="post" action="index.php?page=save_add_user">
    <label for="username">Tên đăng nhập:</label>
    <input name="username" id="username" required>

    <label for="password">Mật khẩu:</label>
    <input name="password" type="password" id="password" required>

    <label for="role">Quyền:</label>
    <select name="role" id="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit">Thêm</button>
</form>

<a class="back-link" href="index.php?page=list_users">Quay lại</a>
