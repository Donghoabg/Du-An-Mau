


<link rel="stylesheet" href="Views/css.css?v=1">
<link rel="stylesheet" href="Views/chitiet.css?v=3"> <!-- mới -->

<div class="vien">
    <header>
        <div class="username">
        <?php
        echo "Xin chào " . htmlspecialchars($_SESSION['username']);
        ?>
        <a href="?page=guest">Đăng Xuất</a>
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
                    <span class="dam"><a href="index.php?page=product">Sản Phẩm</a></span>
                </button>

            </div>
            <div class="searchs">
                <form method="get" action="">
                    <input type="hidden" name="page" value="product"> <!-- Quan trọng -->
                    <input class="search" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="">
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
                <a href="index.php?page=cart"><img src="images/giohang.jpg" alt="" height="70px"></a>
            </div>
            <?php
            
            ?>
        </nav>
<div class="chitiet-wrapper">
    <?php if($product): ?>
        <div class="chitiet-image">
                <span class="new-badge">NEW</span>

            <img src="<?= $product['image'] ?>" alt="Ảnh sản phẩm">
        </div>
        <div class="chitiet-info">
            <h2 class="chitiet-brand">Thương hiệu: <a href="#">Innstyle</a></h2>
            <h1 class="chitiet-name"><?= $product['name'] ?></h1>

            <div class="giamoii">
                <div class="giamoii"><?= number_format($product['price'])?> đ</div>
            </div>

            <div class="chitiet-color-select">
                <span>Màu sắc: </span>
                <button class="color-btn white"></button>
                <button class="color-btn black"></button>
            </div>

            <div class="chitiet-quantity">
                <span>Số lượng:</span>
                <input type="number" value="1" min="1">
            </div>

            <div class="chitiet-actions">
                <a class="chitiet-btn add-cart" href="index.php?page=add&id=<?= $product['id'] ?>">🛒 Thêm vào giỏ</a>
            </div>
        </div>
    <?php endif; ?>
</div>


    </div>
</div>
    
       
<p class="chitiet-description">Mô tả: <?= $product['mota'] ?></p>


<!-- Mô tả sản phẩm đặt riêng dưới product-detail -->

