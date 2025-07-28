<link rel="stylesheet" href="views/css.css?v=1">
<link rel="stylesheet" href="views/products.css">
<style>
    

</style>
<div class="vien">
    <header>
        <div class="username">
        <?php
        echo "Xin chào " . htmlspecialchars($_SESSION['username']);
        ?>
        <a href="?page=Guest">Đăng Xuất</a>
        </div>
    </header>
    <div class="container">
        <nav>
            <div class="logo">
                <a href="?page=home">
                    <img src="images/logo.png" alt="">
                </a>
            </div>
            <div class="danhmucsanpham">
                <button onclick="toggleMenu()" class="dropbtn">
                    <span class="nhat">Danh Mục</span> <br> 
                    <span class="dam">Sản Phẩm</span>
                </button>
                <div id="myDropdown" class="content">
                    <a href="?page=product">Điện thoại</a>
                    <a href="">Laptop</a>
                    <a href="">Phụ kiện</a>
                    <a href="">Đồng hồ thông minh</a>
                    <a href="">Túi xách công nghệ</a>
                    <a href="">Loa công nghệ di động</a>
                </div>
            </div>
            <div class="searchs">
                <form action="" method="get">
                    <input type="hidden" name="page" value="product">
                    <input type="hidden" name="category_id" value="<?= $category_id ?>">
                    <input class="search" type="text" name="keyword" placeholder="Từ khóa" value="<?= htmlspecialchars($keyword) ?>">
                    <input class="submit" type="submit" value="Tìm kiếm">
                </form>
                <div class="sanphamnoibat">
                    <a href="">iPhone 16 Series</a>
                    <a href="">Galaxy Z Fold6|Flip6</a>
                    <a href="">Galaxy S24 Series</a>
                    <a href="">Galaxy Watch</a><br>
                    <a href="">Ultra|Watch7</a>
                    <a href="">DJI Osmo Action 5 Pro</a>
                </div>
            </div>
            <div class="hotline">
                <span class="tenhotline">HOTLINE:</span><br>
                <span class="sdt">0345.888.999</span>
            </div>
            <div class="giohang">
                <a href="?page=giohang"><img src="images/giohang.jpg" alt="" height="70px"></a>
            </div>
            <?php
            
            ?>
        </nav><br><br><br>
        <div class="trangchudienthoai">
            <span class="trangchu">Trang chủ</span> › <span class="dienthoai">Điện Thoại</span>
        </div>
        
            <?php
$selectedCategoryId = $_GET['category_id'] ?? null;
?>

<div class="boxthuonghieu">
    <div class="thuonghieu">DANH MỤC SẢN PHẨM</div>
    <div class="containercheckboxdanhmuc">

        <?php foreach ($categories as $cat): ?>
            <label class="checkbox-label">
                <input
                type="checkbox"
                name="category_id"
                value="<?= $cat['id'] ?>"
                <?= ($selectedCategoryId == $cat['id']) ? 'checked' : '' ?>
                onclick="handleCategoryClick(this)"
                >
                <?= htmlspecialchars($cat['name']) ?>
                <span class="custom-checkmark"></span>
            </label><br>
            <?php endforeach; ?>
        </div>
</div>

        <a href="?page=add_category"></a>
        
        
        <h2>Lọc sản phẩm</h2>
        <form method="get" action="">
            <input type="hidden" name="page" value="product">
            <input type="hidden" name="category_id" value="<?= $category_id ?>">
            <input type="text" name="keyword" placeholder="Từ khóa" value="<?= htmlspecialchars($keyword) ?>">
            <input type="number" name="min_price" placeholder="Giá từ" value="<?= htmlspecialchars($min_price) ?>">
            <input type="number" name="max_price" placeholder="Đến" value="<?= htmlspecialchars($max_price) ?>">
            <button type="submit">Lọc</button>
        </form>

        
        <a href="?page=add_product"></a>
        
        <h2>Sản phẩm</h2>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <a href="?page=detail&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></a>
                    (<?= number_format($product['price']) ?>đ)
                    | <a href="?page=edit_product&id=<?= $product['id'] ?>">Sửa</a>
                    | <a href="?page=delete_product&id=<?= $product['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<script src="Views/js.js?v=12"></script>
<script>
    function handleCategoryClick(checkbox) {
        const categoryId = checkbox.value;
        const isChecked = checkbox.checked;
        const currentId = new URLSearchParams(window.location.search).get("category_id");

        if (isChecked) {
            if (currentId != categoryId) {
                window.location.href = "?page=product&category_id=" + categoryId;
            } else {
                window.location.href = "?page=product";
            }
        } else {
            window.location.href = "?page=product";
      
    }
</script>
        

        