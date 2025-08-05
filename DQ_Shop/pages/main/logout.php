<?php
session_start();
unset($_SESSION['user']); // Xoá user khỏi session
header("Location: ../../index.php?quanly=checkout"); // Trở về checkout
exit;
?>