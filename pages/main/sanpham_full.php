<?php
// PHÂN TRANG
$limit = 4; // Số sản phẩm mỗi trang
$page = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// LẤY TẤT CẢ SẢN PHẨM
$sql = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $limit OFFSET $offset";
$query = mysqli_query($mysqli, $sql);
?>

<h3>Tất cả sản phẩm</h3>
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

<!-- PHÂN TRANG -->
<?php
$sql_count = "SELECT COUNT(*) AS total FROM tbl_sanpham";
$result_count = mysqli_query($mysqli, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_products = $row_count['total'];
$total_pages = ceil($total_products / $limit);

if ($total_pages > 1) {
    echo '<div class="pagination"><ul class="list-trang">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li><a href="index.php?quanly=sanpham_full&trang=' . $i . '"'
            . ($i == $page ? ' style="font-weight:bold;color:red;"' : '') . '>' . $i . '</a></li>';
    }
    echo '</ul></div>';
}
?>
