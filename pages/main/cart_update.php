<?php
session_start();

if (isset($_POST['id']) && isset($_POST['qty'])) {
    $id = (int)$_POST['id'];
    $qty = max(1, (int)$_POST['qty']);

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['soluong'] = $qty;
    }

    $thanhtien = $_SESSION['cart'][$id]['gia'] * $_SESSION['cart'][$id]['soluong'];

    $tongtien = 0;
    foreach ($_SESSION['cart'] as $item) {
        $tongtien += $item['gia'] * $item['soluong'];
    }

    echo json_encode([
        'success' => true,
        'thanhtien' => number_format($thanhtien),
        'tongtien' => number_format($tongtien)
    ]);
}
?>
