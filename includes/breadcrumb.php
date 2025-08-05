<?php
if (isset($_GET['quanly']) && $_GET['quanly'] != '') {
?>
<div class="breadcrumb">
    <a href="index.php">Trang chủ</a>
    <?php
    if ($_GET['quanly'] == 'giohang') {
        echo " → <span>Giỏ hàng</span>";
    } elseif ($_GET['quanly'] == 'sanpham') {
        echo " → <span>Chi tiết sản phẩm</span>";
    }elseif ($_GET['quanly'] == 'danhmuc') {
        echo " → <span>Tất cả sản phẩm</span>";
    } elseif ($_GET['quanly'] == 'danhmucsanpham') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = intval($_GET['id']);
            $sql = "SELECT tendanhmuc FROM tbl_danhmuc WHERE id_danhmuc = '$id' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($query);
            if ($row) {
                echo " → <span>" . htmlspecialchars($row['tendanhmuc']) . "</span>";
            } 
        }
    } elseif ($_GET['quanly'] == 'lienhe') {
        echo " → <span>Liên hệ</span>";
    } elseif ($_GET['quanly'] == 'tintuc') {
        echo " → <span>Tin tức</span>";
    }
    ?>
</div>
<?php
}
?>
