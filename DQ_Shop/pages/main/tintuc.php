<?php
$sql = "SELECT * FROM tbl_baiviet WHERE trangthai = 1 ORDER BY id_baiviet DESC";
$query = mysqli_query($mysqli, $sql);
?>
<p>Tin mới nhất</p>
<ul class="product_list">
    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <li>
            <a href="index.php?quanly=tintuct&idbaiviet=<?php echo $row['id_baiviet'] ?>">
                <img src="img/<?php echo $row['hinhanh'] ?>" width="150px">
                <p class="title_product"><?php echo $row['ten_baiviet'] ?></p>
            </a>
            <p class="title_product"><?php echo $row['noidung'] ?></p>
            <p class="title_product"><?php echo $row['tomtat'] ?></p>
        </li>
    <?php } ?>
</ul>