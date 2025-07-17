<style>
    .vien a{
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="Views/css.css?v=1">
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
        <div class="giasoc">
            <h3>GIÁ SỐC HÔM NAY ⚡</h3>
        </div>
        <main>
            <div class="slider-wrapper">
            <div class="gallery" id="gallery">
                <?php
                foreach ($images as $img) {
                    ?>
                        <div class="box3">
                            <a href="?page=chitiet&id=<?= $img['id'] ?>">
                            <div class="box31">
                                <img class="img" src="<?=$img['image']?>" style="width: 178px;"   alt="">
                                <?php
                                echo $img['name'];
                                ?>
                                <div class="starss">
                                    <span class="star filled">&#9733;</span>
                                    <span class="star filled">&#9733;</span>
                                    <span class="star filled">&#9733;</span>
                                    <span class="star filled">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <?php
                                if(isset($img['giamoi'])){
                                    ?>
                                    <div class="giamoi"><?= number_format($img['giamoi'], 0 ,'', '.')?> đ</div>
                                    <div class="phantram2">
                                        <?php
                                        $phantram = (($img['gia'] - $img['giamoi']) / $img['gia']) * 100;
                                        echo number_format($phantram, 0)  ;
                                        echo " %";
                                        ?>
                                    </div>
                                    <div class="giacu"><?= number_format($img['gia'], 0 ,'', '.')?> đ</div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="giamoi"><?= number_format($img['gia'], 0 ,'', '.')?> đ</div>
                                    <?php
                                }
                                ?>
                            </a>

                            </div>
                            <?php
                            if($_SESSION['role'] === 'admin'){
                                ?>
                            <div class="suaxoa">
                                <a  href="?page=editproduct&id=<?=$img['id']?>">Sửa</a>
                                <a href="?page=delete&id=<?=$img['id']?>">Delete</a>
                            </div>
                            <?php
                            }
                            ?>
                </div>
                    
                    <?php
                }
                ?>
            </div>
            <button class="slinesale" onclick="prevImage()"><img src="images/nutchuyen4.png" height="20px" alt=""></button>
            <button class="slinesale" onclick="nextImage()"><img src="images/nutchuyen3.png" height="20px" alt=""></button>
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
            <h3>SẢN PHẨM HOT</h3>
        </div>
        <div class="containerbox3">
            <?php
            foreach($newproduct as $row){
                ?>
                <div class="box3">
                    <a href="?page=chitiet2&id=<?= $row['id'] ?>">
                    <div class="box31">
                        <h4>NEW</h4>
                        <img src="<?=$row['image']?>"  alt="">
                        <?php
                        echo $row['name'];
                        ?>
                        <div class="starss">
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star filled">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                        <?php
                        if(isset($row['giamoi'])){
                            ?>
                            <div class="giamoi"><?= number_format($row['giamoi'], 0 ,'', '.')?> đ</div>
                            <div class="phantram2">
                                <?php
                                $phantram = (($row['giacu'] - $img['giamoi']) / $row['giacu']) * 100;
                                echo number_format($phantram, 0)  ;
                                echo " %";
                                ?>
                            </div>
                            <div class="giacu"><?= number_format($row['giacu'], 0 ,'', '.')?> đ</div>
                            <?php
                        }else{
                            ?>
                            <div class="giamoi"><?= number_format($row['giacu'], 0 ,'', '.')?> đ</div>
                            <?php
                        }
                        ?>
                    </div>  
                </a>
                
                </div>
                    <?php
                }
                ?>

        </div>
    <div class="banner11">
        <img src="images/24.jpg.png" width="1419px" alt="">
    </div>
</div>

    <?php
    include 'layout/footer.html';
    ?>
    <script>
    const totalImages = <?php echo count($images); ?>;
    </script>
<script src="Views/js.js?v=12"></script>


