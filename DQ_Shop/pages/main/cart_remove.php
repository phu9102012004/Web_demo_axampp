<?php
session_start();
$id = intval($_GET['id'] ?? 0);
unset($_SESSION['cart'][$id]);
header("Location: ../../index.php?quanly=giohang");
exit;
?>
