
<style>
    .from {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 20px auto;
    font-family: 'Segoe UI', sans-serif;
}

.from form {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    justify-content: space-between;
}

.from select,
.from input[type="number"] {
    flex: 1 1 45%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    background: white;
    transition: border-color 0.3s ease;
}

.from select:focus,
.from input[type="number"]:focus {
    border-color: #007BFF;
    outline: none;
}

.from button {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.from button:hover {
    background-color: #0056b3;
}
.box31 img{
    width: 187px;
}
</style>
<link rel="stylesheet" href="Views/css.css?v=1">
<div class="vien">
    <header>
        <div class="username">
        <?php
        echo "Xin chào " . htmlspecialchars($_SESSION['username']);
        ?>
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
                <a href=""><img src="images/giohang.jpg" alt="" height="70px"></a>
            </div>
        </nav>

        <main>
            <div class="ContainerPhone">
                <div class="from">
                    <form method="POST" action="index.php?page=dienthoai">
                        <select name="brand[]">
                            <option value="">-- Tất cả thương hiệu --</option>
                            <option value="Apple" <?= in_array('Apple', $_POST['brand'] ?? []) ? 'selected' : '' ?>>Apple</option>
                            <option value="Samsung" <?= in_array('Samsung', $_POST['brand'] ?? []) ? 'selected' : '' ?>>Samsung</option>
                        </select>

                        <input type="number" name="min" placeholder="Giá từ" value="<?= $_POST['min'] ?? '' ?>">
                        <input type="number" name="max" placeholder="Đến" value="<?= $_POST['max'] ?? '' ?>">

                        <input type="hidden" name="page" value="1">
                        <button type="submit">Lọc</button>
                    </form>
                </div>
                <div class="containerbox3">
            <?php
            foreach($products as $row){
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
                            <div class="giamoi"><?= number_format($row['gia'], 0 ,'', '.')?> đ</div>
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
                
            </div>
            
            

            <div class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <a href="?page=<?= $i ?>&<?= http_build_query($_POST) ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </main>
    </div>
</div>
<?php include 'Views/layout/footer.html'; ?>
<script src="Views/js.js"></script>
