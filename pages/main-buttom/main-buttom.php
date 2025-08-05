<?php
$sql_product = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 5";
$query_product = mysqli_query($mysqli, $sql_product);
?>
<img src="img/mid-banner.jpg">
<br>
<br>
<div class="widget-t">
    <div class="widget-t-l">
        <h4 class="widget-title red">Sản phẩm giới thiệu</h4>
    </div>
    <div class="widget-t-r">
        <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
        <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
    </div>
</div>
<ul class="product_list">
    <?php while ($row_product = mysqli_fetch_array($query_product)) { ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                <img src="img/<?php echo $row_product['hinhanh'] ?>" width="150px">
                <p class="title_product">Tên sản phẩm: <?php echo $row_product['tensanpham'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row_product['gia']) ?> <strong>đ</strong></p>
            </a>
            <form method="POST" action="pages/main/cart_add.php?id_sanpham=<?= $row_product['id_sanpham'] ?>">
                <button type="submit" name="muahang">Mua hàng</button>
            </form>
        </li>
    <?php } ?>
</ul>
<br>