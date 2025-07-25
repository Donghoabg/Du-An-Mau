<link rel="stylesheet" href="views/css.css?v=1">
<style>
    .trangchudienthoai{
        width: 100%;
        background-color: #F8F8F8;
        height: 50px;
        color: #555555;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        line-height: 50px;
    }
    .dienthoai{
        color: black;
    }
    .thuonghieu{
        margin-top: 15px;
        font-size: 18px;
        font-weight: 700;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .boxthuonghieu{
        margin-left: 20px;
        width: 255px;
        height: 408px;

    }
    .boxtenthuonghieu{
        width: 111px;
        height: 30px;
        background-color: #EEEEEE;
    }

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
        </nav><br><br><br>
        <div class="trangchudienthoai">
            Trang chủ › <span class="dienthoai">Điện Thoại</span>
        </div>
        <div class="boxthuonghieu">
            <div class="thuonghieu">Thương Hiệu</div>
            <div class="boxtenthuonghieu">
                <ul>
            <?php foreach ($categories as $cat): ?>
                <li>
                    <a href="?page=product&category_id=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></a>
                    | <a href="?page=edit_category&id=<?= $cat['id'] ?>">Sửa</a>
                    | <a href="?page=delete_category&id=<?= $cat['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
                </li>
            <?php endforeach; ?>
        </ul>
            </div>
        </div>
        
        <a href="?page=add_category">Thêm danh mục</a>
        
        <hr>
        
        <h2>Lọc sản phẩm</h2>
        <form method="get">
            <input type="hidden" name="category_id" value="<?= $category_id ?>">
            <input type="text" name="keyword" placeholder="Từ khóa" value="<?= htmlspecialchars($keyword) ?>">
            <input type="number" name="min_price" placeholder="Giá từ" value="<?= htmlspecialchars($min_price) ?>">
            <input type="number" name="max_price" placeholder="Đến" value="<?= htmlspecialchars($max_price) ?>">
            <button type="submit">Lọc</button>
        </form>
        
        <a href="?page=add_product">Thêm sản phẩm</a>
        
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
        

        