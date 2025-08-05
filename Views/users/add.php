<h2>Thêm người dùng</h2>
<form method="post" action="index.php?page=save_add_user">
    Tên đăng nhập: <input name="username" required><br>
    Mật khẩu: <input name="password" type="password" required><br>
    Quyền: <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Thêm</button>
</form>
