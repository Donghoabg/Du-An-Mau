<link rel="stylesheet" href="views/css.css?v=1">
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
                    <a href="?page=dienthoai">Điện thoại</a>
                    <a href="">Laptop</a>
                    <a href="">Phụ kiện</a>
                    <a href="">Đồng hồ thông minh</a>
                    <a href="">Túi xách công nghệ</a>
                    <a href="">Loa công nghệ di động</a>
                </div>
            </div>
            <div class="searchs">
                <form action="">
                    <input class="search" type="search">
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
        </nav>
        <div class="banner-container">
            <div class="banner">
                <a href="">
                    <img src="images/banner9.jpg" alt="Banner 1" class="banner-image" height="1000px" />
                </a>
                <a href="">
                    <img src="images/banner10.jpg" alt="Banner 2" class="banner-image" />
                </a>
                <a href="">
                    <img src="images/banner11.jpg" alt="Banner 3" class="banner-image" />
                </a>
            </div>
            <button class="prev" onclick="moveBanner(-1)">&#10094;</button>
            <button class="next" onclick="moveBanner(1)">&#10095;</button>
        </div>
        <div class="banner4">
            <a href="">
                <img src="images/banner12.jpg" alt="">
            </a>
        </div>
        <div class="banner5">
            <a href="">
                <img src="images/banner13.jpg" alt="">
            </a>
        </div>
        <div class="bannerdai">
            <img src="images/bannerdai.png" alt="">
        </div>
        <div class="khoangtrang">

        </div>
<h2>Danh mục</h2>
<ul>
    <?php foreach ($categories as $cat): ?>
        <li>
            <a href="?category_id=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a>
            | <a href="?action=edit_category&id=<?= $cat['id'] ?>">Sửa</a>
            | <a href="?action=delete_category&id=<?= $cat['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="?action=add_category">Thêm danh mục</a>

<hr>

<h2>Lọc sản phẩm</h2>
<form method="get">
    <input type="hidden" name="category_id" value="<?= $category_id ?>">
    <input type="text" name="keyword" placeholder="Từ khóa" value="<?= htmlspecialchars($keyword) ?>">
    <input type="number" name="min_price" placeholder="Giá từ" value="<?= htmlspecialchars($min_price) ?>">
    <input type="number" name="max_price" placeholder="Đến" value="<?= htmlspecialchars($max_price) ?>">
    <button type="submit">Lọc</button>
</form>

<a href="?action=add_product">Thêm sản phẩm</a>

<h2>Sản phẩm</h2>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <a href="?action=detail&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></a>
            (<?= number_format($product['price']) ?>đ)
            | <a href="?action=edit_product&id=<?= $product['id'] ?>">Sửa</a>
            | <a href="?action=delete_product&id=<?= $product['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
        </li>
    <?php endforeach; ?>
</ul>

        