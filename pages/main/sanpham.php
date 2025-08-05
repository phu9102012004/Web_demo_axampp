<?php
// LẤY TOÀN BỘ SẢN PHẨM (KHÔNG PHÂN TRANG)
$sql = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
$query = mysqli_query($mysqli, $sql);
?>
<ul class="product_list">
    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="img/<?php echo $row['hinhanh'] ?>" width="150px">
                <p class="title_product"><?php echo $row['tensanpham'] ?></p>
                <p class="price_product"><?php echo number_format($row['gia']) ?> vnđ</p>
            </a>
        </li>
    <?php } ?>
</ul>
