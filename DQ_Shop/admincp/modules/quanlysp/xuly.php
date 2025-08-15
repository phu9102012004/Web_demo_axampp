<?php
 include('../../config/config.php');

$tensanpham = $_POST['tensanpham'] ?? '';
$noidung    = $_POST['noidung'] ?? '';
$gia        = $_POST['gia'] ?? '';
$soluong    = $_POST['soluong'] ?? '';
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'] ?? '';
$hinhanh    = $_FILES['hinhanh']['name'] ?? '';
$trangthai  = $_POST['trangthai'] ?? '';
$danhmuc  = $_POST['danhmuc'] ?? '';
if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tbl_sanpham (tensanpham, noidung, gia, soluong, hinhanh, trangthai,id_danhmuc) 
                 VALUES ('$tensanpham', '$noidung', '$gia', '$soluong', '$hinhanh', '$trangthai', '$danhmuc')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, '../img/' . $hinhanh);
    header('Location: ../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {
    $id = $_GET['idsanpham'] ?? '';
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, '../img/' . $hinhanh);
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', noidung='$noidung', gia='$gia', soluong='$soluong', hinhanh='$hinhanh', trangthai='$trangthai', id_danhmuc='$danhmuc' WHERE id_sanpham='$id'";
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('../../img/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', noidung='$noidung', gia='$gia', soluong='$soluong', trangthai='$trangthai', id_danhmuc='$danhmuc' WHERE id_sanpham='$id'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_GET['idsanpham'])) {
    $id = $_GET['idsanpham'];
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: ../../index.php?action=quanlysanpham&query=them');
}
