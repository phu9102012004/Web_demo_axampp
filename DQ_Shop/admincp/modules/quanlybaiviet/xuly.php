<?php
 include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'] ?? '';
$noidung    = $_POST['noidung'] ?? '';
$tomtat     = $_POST['tomtat'] ?? '';
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'] ?? '';
$hinhanh    = $_FILES['hinhanh']['name'] ?? '';
$trangthai  = $_POST['trangthai'] ?? '';
$danhmuc  = $_POST['danhmuc'] ?? '';
if (isset($_POST['thembaiviet'])) {
    $sql_them = "INSERT INTO tbl_baiviet (ten_baiviet, noidung, hinhanh, trangthai,id_danhmuc_baiviet) 
                 VALUES ('$tenbaiviet', '$noidung', '$hinhanh', '$trangthai', '$danhmuc')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, '../../../img/' . $hinhanh);
    header('Location: ../../index.php?action=quanlybaiviet&query=them');
} elseif (isset($_POST['suabaiviet'])) {
    $id = $_GET['idbaiviet'] ?? '';
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, '../../../img/' . $hinhanh);
        $sql_update = "UPDATE tbl_baiviet SET ten_baiviet='$tenbaiviet', noidung='$noidung', tomtat='$tomtat', hinhanh='$hinhanh', trangthai='$trangthai', id_danhmuc_baiviet='$danhmuc' WHERE id_baiviet='$id'";
        $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('../../../img/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_baiviet SET ten_baiviet='$tenbaiviet', noidung='$noidung', tomtat='$tomtat', trangthai='$trangthai', id_danhmuc_baiviet='$danhmuc' WHERE id_baiviet='$id'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlybaiviet&query=them');
} elseif (isset($_GET['idbaiviet'])) {
    $id = $_GET['idbaiviet'];
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: ../../index.php?action=quanlybaiviet&query=them');
}
