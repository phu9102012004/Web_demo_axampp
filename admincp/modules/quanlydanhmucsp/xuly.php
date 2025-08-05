
<?php
// Kết nối CSDL
include('../../config/config.php');
// Lấy dữ liệu từ form
$tenlsp = $_POST['tendanhmuc'] ?? '';
$thutu  = $_POST['thutu'] ?? '';

if (isset($_POST['themdanhmuc'])) {
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUES ('".$tenlsp."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc ='".$tenlsp."', thutu='".$thutu."'WHERE id_danhmuc = '$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_update);
    header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
}else{
    $id = $_GET['iddanhmuc']??'' ;
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
}
?>