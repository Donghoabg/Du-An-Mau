<style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background: white;
}

.product-detail {
    display: flex;
    gap: 30px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    max-width: 1300px;
    margin: 50px auto 20px;
    padding: 30px;
}

.product-image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-image img {
    width: 70%;
    max-width: 60%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    object-fit: contain;
}

.product-info {
    flex: 1;
    max-width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.brand {
    font-size: 14px;
    color: #888;
    margin-bottom: 5px;
}

.name {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
}

.desc-list {
    list-style: disc;
    padding-left: 20px;
    margin-bottom: 20px;
    color: #444;
    font-size: 15px;
}

.price-box {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.current-price {
    font-size: 24px;
    color: #e53935;
    font-weight: bold;
}

.old-price {
    text-decoration: line-through;
    color: #888;
}

.discount {
    background-color: #e53935;
    color: white;
    font-size: 14px;
    padding: 2px 8px;
    border-radius: 4px;
}

.color-select {
    margin: 15px 0;
}

.color-btn {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #ccc;
    margin-left: 10px;
    cursor: pointer;
}

.color-btn.white {
    background: #fff;
}

.color-btn.black {
    background: #000;
}

.quantity {
    margin-bottom: 15px;
    font-size: 16px;
}

.quantity input {
    width: 60px;
    padding: 5px;
    font-size: 16px;
}

.actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 18px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
    font-weight: bold;
}

.add-cart {
    background-color: #1976d2;
    color: #fff;
}

.buy-now {
    background-color: #e53935;
    color: #fff;
}

.favorite {
    background-color: #f5f5f5;
    color: #e53935;
    border: 1px solid #e53935;
}

.btn:hover {
    opacity: 0.9;
}

.product-description {
    max-width: 910px; /* 70% của 1300px */
    margin: 30px auto;
    color: #222222;
    line-height: 1.6;
    background: #fff;
    padding: 25px 30px;
    border-radius: 10px;
    font-size: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
}


</style>
<link rel="stylesheet" href="Views/css.css?v=1">
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
                <a href=""><img src="images/giohang.jpg" alt="" height="70px"></a>
            </div>
            <?php
            
            ?>
        </nav>
        <div class="product-detail">
    <?php if($product): ?>
        <div class="product-image">
            <img src="<?= $product['image'] ?>" alt="Ảnh sản phẩm">
        </div>
        <div class="product-info">
            <h2 class="brand">Thương hiệu: <a href="#">Innstyle</a></h2>
            <h1 class="name"><?= $product['name'] ?></h1>

            

            <div class="price-box">
                <?php
                if(isset($product['giamoi'])){
                            ?>
                            <div class="current-price"><?= number_format($product['giamoi'], 0 ,'', '.')?> đ</div>
                            <div class="discount">
                                <?php
                                $phantram = (($product['giacu'] - $product['giamoi']) / $product['giacu']) * 100;
                                echo number_format($phantram, 0)  ;
                                echo " %";
                                ?>
                            </div>
                            <div class="old-price"><?= number_format($product['giacu'], 0 ,'', '.')?> đ</div>
                            <?php
                        }else{
                            ?>
                            <div class="giamoi"><?= number_format($product['giacu'], 0 ,'', '.')?> đ</div>
                            <?php
                        }
                        ?>
                
            </div>

            <div class="color-select">
                <span>Màu sắc: </span>
                <button class="color-btn white"></button>
                <button class="color-btn black"></button>
            </div>

            <div class="quantity">
                <span>Số lượng:</span>
                <input type="number" value="1" min="1">
            </div>

            <div class="actions">
                
                <a class="btn add-cart" href="?page=themsanpham&id=<?= $product['id'] ?>">🛒 Thêm vào giỏ</a>
                <button class="btn buy-now">⚡ Mua ngay</button>
                <button class="btn favorite">❤️ Yêu thích</button>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Mô tả sản phẩm đặt riêng dưới product-detail -->
<p class="product-description">Mô tả: <?= $product['mota'] ?></p>

