<link rel="stylesheet" href="views/css.css?v=12">
<link rel="stylesheet" href="views/products.css?v=12">
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
        <div class="main-content">
                
    
                <div class="cotbentrai">
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
                    
                    <div class="containerlocsanpham">
            
                        <h2>Chọn khoảng giá</h2>
                        <form id="filterForm" method="get" action="">
                            <input type="hidden" name="page" value="product">
                            <input type="hidden" name="category_id" value="<?= isset($category_id) ? $category_id : '' ?>">
                        
                            <div>
                                <button type="button" onclick="setPriceAndSubmit(2000000, 5000000)">Từ 2Tr - 5Tr</button><br>
                                <button type="button" onclick="setPriceAndSubmit(6000000, 12000000)">Từ 6Tr - 12Tr</button><br>
                                <button type="button" onclick="setPriceAndSubmit(13000000, 20000000)">Từ 13Tr - 20Tr</button><br>
                                <button type="button" onclick="setPriceAndSubmit(21000000, '')">Trên 20Tr</button>
                            </div>
                        
                            <br>
                        
                            <input type="number" name="min_price" id="min_price" placeholder="Giá từ" value="<?= isset($min_price) ? htmlspecialchars($min_price) : '' ?>">
                            <input type="number" name="max_price" id="max_price" placeholder="Đến" value="<?= isset($max_price) ? htmlspecialchars($max_price) : '' ?>">
                        
                            <br><br>
                            <button type="submit"> <strong>ÁP DỤNG</strong></button> 
                        </form>
                    </div>
                    
                </div>
                
        
                <div class="cotbenphai">
                    <a href="?page=add_product"></a>
                    <div class="tieude">
                        <h2>SẢN PHẨM</h2>
                    </div>
                    <div class="luachon">
                        <a href="?page=product&sort=new" class="<?= ($_GET['sort'] ?? '') == 'new' ? 'active' : '' ?>">Mới nhất</a>
                        <a href="?page=product&sort=asc" <?= isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'style="font-weight:bold;"' : '' ?>>Giá thấp đến cao</a> |
                        <a href="?page=product&sort=desc" <?= isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'style="font-weight:bold;"' : '' ?>>Giá cao đến thấp</a>

                    </div>


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
    }
</script>
<script>
    function setPriceAndSubmit(min, max) {
        document.getElementById('min_price').value = min;
        document.getElementById('max_price').value = max;
        
        // Tự động submit form
        document.getElementById('filterForm').submit();
    }
</script>
<script>
    const options = document.querySelectorAll('.luachon a');

    options.forEach(option => {
        option.addEventListener('click', function(e) {
             // ngăn chuyển trang nếu dùng #
            
            // Bỏ class active của tất cả
            options.forEach(opt => opt.classList.remove('active'));

            // Thêm class active cho thẻ đang click
            this.classList.add('active');
        });
    });
</script>

</div>
</div>