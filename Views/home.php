<style>
    .vien a{
        text-decoration: none;
    }
    .product-list-tight {
    gap: 0 !important; /* rút ngắn khoảng cách */
}
.product-list-tight {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* rút khoảng cách giữa các item */
}
.new{
    background-color: #CB0000;
    margin: 10px;
    padding: 2px;
    border-radius: 3px;
    color: white;
    position: absolute;
    font-size: 9px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}
<?php
            session_start();
?>

    
</style>
<link rel="stylesheet" href="Views/css.css?v=1">
<link rel="stylesheet" href="Views/products.css?v=3">
<?php
?>
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
        <div class="giasoc">
            <h3>GIÁ SỐC HÔM NAY ⚡</h3>
        </div>
        <main>
            
<div class="slider-wrapper">
    <button class="slinesale" onclick="prevGroup()"><img src="images/nutchuyen4.png" height="20px" alt=""></button>
    <div class="gallery" id="gallery">
        <?php foreach ($productss as $product): ?>
            <div class="box3">
                <a href="?page=chitiet&id=<?= $product['id'] ?>">
                    <div class="box31">
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="178px">
                        <?= htmlspecialchars($product['name']) ?><br>
                        <div class="starss">
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                        <?php if(isset($product['sale_price'])): ?>
                            <div class="sale_price"><?= number_format($product['sale_price'], 0 ,'', '.')?> đ</div>
                            <div class="phantram2">
                                <?php
                                $phantram = (($product['original_price'] - $product['sale_price']) / $product['original_price']) * 100;
                                echo number_format($phantram, 0)  ;
                                echo " %";
                                ?>
                            </div>
                            <div class="giacu"><?= number_format($product['original_price'], 0 ,'', '.')?> đ</div>
                        <?php else: ?>
                            <div class="giamoi"><?= number_format($product['original_price'], 0 ,'', '.')?> đ</div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="slinesale" onclick="nextGroup()"><img src="images/nutchuyen3.png" height="20px" alt=""></button>
</div>
        <div class="banner578">
            <img src="images/banner5.jpg" height="100px" alt="">
            <img src="images/banner7.jpg" height="100px" alt="">
            <img src="images/banner8.jpg" height="100px" alt="">
        </div>
        

        <div class="dmsp">
            <h3>DANH MỤC SẢN PHẨM</h3>
        </div>
        <div class="danhmuc">
                <div class="box2"> <a href=""><img src="images/dienthoai.webp" alt=""><span class="text">Điện thọai</span></a></div>
                <div class="box2"><a href=""><img src="images/2.jpg" alt=""><span class="text">Máy tính bảng</span></a></div>
                <div class="box2"><a href=""><img src="images/3.jpg" alt=""><span class="text">Sản phẩm Apple</span></a></div>
                <div class="box2"><a href=""><img src="images/4.jpg" alt=""><span class="text">Bao da ốp lưng</span></a></div>
                <div class="box2"><a href=""><img src="images/5.jpg" alt=""><span class="text">Loa công nghệ</span></a></div>
                <div class="box2"><a href=""><img src="images/6.jpg" alt=""><span class="text">Tai nghe</span></a></div>
                <div class="box2"><a href=""><img src="images/7.jpg" alt=""><span class="text">Kraoke/Âm thanh gia đình</span> </a></div>
                <div class="box2"><a href=""><img src="images/8.jpg" alt=""><span class="text">Soundbar</span></a></div>
                <div class="box2"><a href=""><img src="images/9.jpg" alt=""><span class="text">Đồng hồ</span></a></div>
                <div class="box2"><a href=""><img src="images/10.jpg" alt=""><span class="text">Sản phẩm độc lạ khác</span></a></div>
                <div class="box2"><a href=""><img src="images/11.jpg" alt=""><span class="text">Sản phẩm độc lạ khác</span></a></div>
                <div class="box2"><a href=""><img src="images/12.jpg" alt=""><span class="text">Đồ dã ngoại</span></a></div>
                <div class="box2"><a href=""><img src="images/13.jpg" alt=""><span class="text">Nhà thông minh</span></a></div>
                <div class="box2"><a href=""><img src="images/15.jpg" alt=""><span class="text">Phụ kiện</span></a></div>
                <div class="box2"><a href=""><img src="images/17.jpg" alt=""><span class="text">Balo công nghệ</span></a></div>
                <div class="box2"><a href=""><img src="images/14.jpg" alt=""><span class="text">Đồ dùng rồi</span></a></div> 
        </div>
        <div class="banner10">
            <img src="images/21.jpg" alt="">
            <img src="images/22.jpg" alt="">
            <img src="images/20.png" alt="">
        </div>
        <div class="vuacohang">
            <h3>SẢN PHẨM</h3>
        </div>
        <div class="product-list product-list-tight">

        <?php


            foreach ($products as $img) {
                ?>
                <div class="newproduct">
                    <span class="new">NEW</span>
                    <a href="?page=chitiet&id=<?= $img['id']  ?>">
                    
                        <img  src="<?=$img['image']?>">
                        <div class="name">
                            <?php
                            echo $img['name'];
                            ?>

                        </div>
                        <div class="starss">
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                        <div class="prices"><?= number_format($img['price'], 0 ,'', '.')?> đ</div>
                    </a>
                    
                        <div class="boxdathang">
                            <a href="index.php?page=add&id=<?= $img['id'] ?>">Thêm Giỏ Hàng</a>
                        </div>
                </div>
                <?php
            }
            ?>
        </div>
                            <br><br><br>
                            <div class="pagination">
                                <br><br>
                                <?php
                                $query = $_GET;
                                for ($i = 1; $i <= $totalPages; $i++):
                                    $query['p'] = $i;
                                    $link = '?' . http_build_query($query);
                                ?>
                                    <a href="<?= $link ?>" <?= ($i == $page) ? 'style="font-weight:bold;"' : '' ?>><?= $i ?></a>
                                <?php endfor; ?>

                            </div><br><br><br>

    <div class="banner11">
        <img src="images/24.jpg.png" width="1419px" alt="">
    </div>
    
</div>

</div>

    <?php
    include 'layout/footer.html';
    ?>
    <script>
    // Slider GIÁ SỐC HÔM NAY
    document.addEventListener("DOMContentLoaded", function () {
        const gallery = document.getElementById("gallery");
        if (gallery) {
            const items = gallery.querySelectorAll(".box3");
            const visibleCount = 5;
            const itemWidth = 220;
            let groupIndex = 0;
            const totalItems = items.length;
            const maxGroup = Math.ceil(totalItems / visibleCount);
            function updateSlide() {
                const translateX = -groupIndex * visibleCount * itemWidth;
                gallery.style.transform = `translateX(${translateX}px)`;
                gallery.style.transition = "transform 0.5s ease";
            }
            window.nextGroup = function () {
                if (groupIndex < maxGroup - 1) {
                    groupIndex++;
                } else {
                    groupIndex = 0;
                }
                updateSlide();
            }
            window.prevGroup = function () {
                if (groupIndex > 0) {
                    groupIndex--;
                } else {
                    groupIndex = maxGroup - 1;
                }
                updateSlide();
            }
            updateSlide();
        }

        // Slider cho banner
        const banner = document.querySelector('.banner');
        if (banner) {
            const images = banner.querySelectorAll('.banner-image');
            let bannerIndex = 0;
            const totalBanner = images.length;
            function updateBanner() {
                const translateX = -bannerIndex * 1100;
                banner.style.transform = `translateX(${translateX}px)`;
                banner.style.transition = "transform 0.5s ease";
            }
            window.moveBanner = function(n) {
                bannerIndex += n;
                if (bannerIndex >= totalBanner) bannerIndex = 0;
                if (bannerIndex < 0) bannerIndex = totalBanner - 1;
                updateBanner();
            }
            updateBanner();
        }
    });
    </script>