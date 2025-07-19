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
        