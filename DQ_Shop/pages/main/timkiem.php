<?php
if (isset($_POST['tukhoa'])) {
    $tukhoa = mysqli_real_escape_string($mysqli, $_POST['tukhoa']); // chống SQL injection

    $sql_product = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                    WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
                    AND tbl_sanpham.tensanpham LIKE '%$tukhoa%'";

    $query_product = mysqli_query($mysqli, $sql_product);
?>
    <ul class="product_list">
        <?php while ($row_product = mysqli_fetch_array($query_product)) { ?>
            <li>
                <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                    <img src="img/<?php echo $row_product['hinhanh'] ?>" width="150px">
                    <p class="title_product"><?php echo $row_product['tensanpham'] ?></p>
                    <p class="price_product"><?php echo number_format($row_product['gia']) ?> <strong>đ</strong></p>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
