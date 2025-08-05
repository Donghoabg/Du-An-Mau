<h2>Sửa người dùng</h2>
<form method="post" action="index.php?page=save_edit_user">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    Tên đăng nhập: <input name="username" value="<?= $user['username'] ?>" required><br>
    Mật khẩu mới (để trống nếu không đổi): <input name="password" type="password"><br>
    Quyền: 
    <select name="role">
        <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
        <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
    </select><br>
    <button type="submit">Cập nhật</button>
</form>
