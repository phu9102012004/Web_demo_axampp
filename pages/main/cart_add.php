<?php
// cart_add.php
session_start();
include('../../admincp/config/config.php');

if (isset($_GET['id_sanpham']) && isset($_POST['muahang'])) {
    $id = intval($_GET['id_sanpham']);
    $soluong = isset($_POST['soluong']) ? max(1, (int)$_POST['soluong']) : 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) { 
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id' => $row['id_sanpham'],
                'tensanpham' => $row['tensanpham'],
                'gia' => $row['gia'],
                'hinhanh' => $row['hinhanh'],
                'soluong' => $soluong
            ];
        } else {
            $_SESSION['cart'][$id]['soluong'] += $soluong;
        }
    }
    header("Location: ../../index.php?quanly=giohang");
    exit;
}
?>



