<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_chitiet = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $id LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    $row = mysqli_fetch_array($query_chitiet);
    if ($row):
?>
        <!-- Chi tiết sản phẩm -->
        <div class="product-detail">
            <div class="product-gallery">
                <img src="img/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['tensanpham'] ?>">
            </div>

            <div class="product-info">
                <h1><?php echo $row['tensanpham'] ?></h1>
                <div class="main-product-info">
                    <div class="price-status">
                        <p class="price"><?php echo number_format($row['gia']) ?> VNĐ</p>
                        <p class="trang-thai"><?php echo ($row['trangthai'] == 1) ? 'Còn hàng' : 'Hết hàng'; ?></p>
                    </div>
                </div>
                <form method="POST" action="pages/main/cart_add.php?id_sanpham=<?= $row['id_sanpham'] ?>">
                    <input type="number" name="soluong" value="1" min="1" max="<?= $row['soluong'] ?>">
                    <button type="submit" name="muahang">Thêm vào giỏ</button>
                </form>
            </div>
        </div>

        <!-- Tabs mô tả/thông tin -->
        <div class="product-tabs">
            <button class="tab-btn active">Mô tả sản phẩm</button>
            <div class="tab-content active">
                <?php echo $row['noidung'] ?>
            </div>
        </div>

<?php
    else:
        echo "<p>Không tìm thấy sản phẩm.</p>";
    endif;
}
?>