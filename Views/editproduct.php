<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">ID</label><br>
        <input type="number" name="id" value="<?=$EditProduct['id']?>"><br>
        <label for="">Sản Phẩm</label><br>
        <input type="text" name="name" value="<?=$EditProduct['name']?>"><br>
        <label for="">Giá</label><br>
        <input type="number" name="gia" value="<?=$EditProduct['giamoi']?>"><br>
        <label for="">Mô tả</label><br>
        <input type="text" name="mota" value="<?=$EditProduct['mota']?>"><br>
        <input type="file" name="image" value="<?=$EditProduct['image']?>"><br>
        <input type="submit" name="edit" value="Cập Nhật"><br>
    </form>
    
</body>
</html>