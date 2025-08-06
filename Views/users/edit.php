<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form label {
        margin: 10px 0 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="password"],
    form select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    button {
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<div class="form-container">
    <h2>Sửa người dùng</h2>
    <form method="post" action="index.php?page=save_edit_user">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label for="username">Tên đăng nhập:</label>
        <input name="username" id="username" value="<?= $user['username'] ?>" required>

        <label for="password">Mật khẩu mới (để trống nếu không đổi):</label>
        <input name="password" id="password" type="password">

        <label for="role">Quyền:</label>
        <select name="role" id="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button type="submit">Cập nhật</button>
    </form>
</div>
