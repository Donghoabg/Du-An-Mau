

<h2>Giỏ hàng</h2>
<style>
    table{
        border: 1px solid black;
        border-collapse: collapse ;
    }
    td{
    border: 1px solid black; 
    padding: 8px; 
    text-align: center;
}
</style>
<?php
if(empty($_SESSION['cart'])){
    echo "<p>Giỏ hàng của bạn đang trống.</p>";
} else {?>
    <table >
        <tr>
            <td>Ảnh</td>
            <td>Tên sản phẩm</td>>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
        </tr>
        <?php
        $tongtien = 0;
        foreach($_SESSION['cartt'] as $id => $sp){
            $thanhtien = $sp['giamoi'] * $sp['soluong'];
            $tongtien += $thanhtien;
        ?>
        
            <tr>
                
                <td><img src="<?=$sp['image']?>" width="100"></td>
                <td><?= $sp['name']?></td>
                <td><?= $sp['giamoi']?> Triệu USD</td>
                <td><?php if(isset($sp['soluong'])){
                    echo $sp['soluong'];
                }else{
                    echo "0";
                }?></td>


                <td><?= number_format($thanhtien) ?> Triệu USD</td>
            </tr>
        <?php 

        }
         ?>
    </table>
    <h3>Tổng tiền: <?= number_format($tongtien) ?> Triệu USD</h3>


    <!-- Nút mua hàng -->
    <form action="?page=muahang" method="POST">
        <label>Họ và tên:</label>
        <input type="text" name="hoten" required><br><br>


        <label>Địa chỉ:</label>
        <input type="text" name="diachi" required><br><br>


        <label>Số điện thoại:</label>
        <input type="text" name="sdt" required><br><br>


        <input type="submit" value="Mua hàng">
    </form>
<?php
}
?>

