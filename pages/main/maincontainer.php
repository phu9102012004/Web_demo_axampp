<?php
$sql_productm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 4";
$query_productm = mysqli_query($mysqli, $sql_productm,);
$sql_productn = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 4";
$query_productn = mysqli_query($mysqli, $sql_productn);
?>
<div class="main-wrapper">
    <?php
        include("pages/sidebar/sidebar.php");
    ?>
    <div class="main-content">
        <div class="widget-t">
            <div class="widget-t-l">
                <h4 class="widget-title red">Sản phẩm mới nhất</h4>
            </div>
            <div class="widget-t-r">
                <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
                <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
            </div>
        </div>
        <ul class="product_list">
            <?php while ($row_productm = mysqli_fetch_array($query_productm)) { ?>
                <li>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_productm['id_sanpham'] ?>">
                        <img src="img/<?php echo $row_productm['hinhanh'] ?>" width="150px">
                        <p class="title_product"><?php echo $row_productm['tensanpham'] ?></p>
                        <p class="price_product"><?php echo number_format($row_productm['gia']) ?> <strong>đ</strong></p>
                    </a>
                    <form method="POST" action="pages/main/cart_add.php?id_sanpham=<?= $row_productm['id_sanpham'] ?>">
                        <button type="submit" name="muahang">Mua hàng</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
        <br>
        <div class="widget-t">
            <div class="widget-t-l">
                <h4 class="widget-title red">Sản phẩm nổi bật</h4>
            </div>
            <div class="widget-t-r">
                <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
                <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
            </div>
        </div>
        <ul class="product_list">
            <?php while ($row_productn = mysqli_fetch_array($query_productn)) { ?>
                <li>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_productn['id_sanpham'] ?>">
                        <img src="img/<?php echo $row_productn['hinhanh'] ?>" width="150px">
                        <p class="title_product"><?php echo $row_productn['tensanpham'] ?></p>
                        <p class="price_product"><?php echo number_format($row_productn['gia']) ?> <strong>đ</strong></p>
                    </a>
                    <form method="POST" action="pages/main/cart_add.php?id_sanpham=<?= $row_productm['id_sanpham'] ?>">
                        <button type="submit" name="muahang">Mua hàng</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="main-buttom">
    <?php
    include("pages/main-buttom/main-buttom.php");
    ?>
</div>
