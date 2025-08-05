<?php
session_start();
require_once __DIR__ . '../../../admincp/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user']['id'] ?? null;

    // ✅ Lấy dữ liệu form
    $hoten   = trim($_POST['hoten']);
    $email   = trim($_POST['email']);
    $sdt     = trim($_POST['sdt']);
    $diachi  = trim($_POST['diachi']);
    $tinh    = trim($_POST['tinh']);
    $huyen   = trim($_POST['huyen']);
    $payment = trim($_POST['payment']);
    $shipping = intval($_POST['shipping']);

    $address = $diachi . ', ' . $huyen . ', ' . $tinh;

    $tongtien = 0;
    $cart_items = [];

    $ids = array_keys($_SESSION['cart']);
    $ids_sql = implode(",", array_map('intval', $ids));
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham IN ($ids_sql)";
    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id_sanpham'];
        $soluong = $_SESSION['cart'][$id]['soluong'];
        $thanhtien = $soluong * $row['gia'];
        $tongtien += $thanhtien;
        $cart_items[] = [
            'id' => $id,
            'name' => $row['tensanpham'],
            'image' => $row['hinhanh'],
            'soluong' => $soluong,
            'gia' => $row['gia'],
        ];
    }

    $tongtien += $shipping;
    $code_cart = rand(0, 9999) . time(); // Tạo mã đơn hàng
    // ✅ Thêm vào bảng tbl_orders
    $stmt = $mysqli->prepare("INSERT INTO tbl_orders (user_id, code_cart, hoten, email, sdt, address, tinh, huyen, payment, shipping, total, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'chưa xử lý')");
    $stmt->bind_param("issssssssis", $user_id, $code_cart, $hoten, $email, $sdt, $address, $tinh, $huyen, $payment, $shipping, $tongtien);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // ✅ Thêm từng sản phẩm vào bảng tbl_order_items
    foreach ($cart_items as $item) {
        $product_id = $item['id'];
        $quantity = $item['soluong'];

        // Lấy chi tiết sản phẩm từ bảng sản phẩm
        $product_query = $mysqli->prepare("SELECT tensanpham, gia, hinhanh FROM tbl_sanpham WHERE id_sanpham = ?");
        $product_query->bind_param("i", $product_id);
        $product_query->execute();
        $product_result = $product_query->get_result();

        if ($product_result->num_rows > 0) {
            $product = $product_result->fetch_assoc();

            // Chèn vào bảng order_items
            $stmt_item = $mysqli->prepare("INSERT INTO tbl_order_items (order_id,code_cart, product_id, product_name, quantity, price, image) VALUES (?, ?, ?, ?, ?, ?,?)");
            $stmt_item->bind_param(
                "isiisds",
                $order_id,
                $code_cart,
                $product_id,
                $product['tensanpham'],
                $quantity,
                $product['gia'],
                $product['hinhanh']
            );
            $stmt_item->execute();
        }
    }

    // ✅ Xoá giỏ hàng
    unset($_SESSION['cart']);

    // ✅ Chuyển về trang xác nhận
    header("Location: dathangthanhcong.php?id=" . $order_id);
    exit;
} else {
    echo "Không có sản phẩm trong giỏ hàng hoặc lỗi dữ liệu!";
}
