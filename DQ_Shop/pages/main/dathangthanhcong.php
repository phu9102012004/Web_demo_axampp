<?php
require_once __DIR__ . '../../../admincp/config/config.php';

$order_id = $_GET['id'] ?? null;

if (!$order_id) {
    echo "Không tìm thấy đơn hàng!";
    exit;
}

// Lấy thông tin đơn hàng từ bảng tbl_orders
$sql = "SELECT * FROM tbl_orders WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Đơn hàng không tồn tại!";
    exit;
}

$order = $result->fetch_assoc();

// Lấy danh sách sản phẩm trong đơn hàng từ bảng tbl_order_items
$sql_items = "SELECT * FROM tbl_order_items WHERE order_id = ?";
$stmt_items = $mysqli->prepare($sql_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt hàng thành công</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    h2 { color: green; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
    th { background-color: #f2f2f2; }
    .info p { margin: 4px 0; }
  </style>
</head>
<body>

  <h2>🎉 Đặt hàng thành công!</h2>

  <div class="info">
    <p><strong>Mã đơn hàng:</strong> <?= $order['id'] ?></p>
    <p><strong>Khách hàng:</strong> <?= htmlspecialchars($order['hoten']) ?></p>
    <p><strong>Điện thoại:</strong> <?= htmlspecialchars($order['sdt']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
    <p><strong>Địa chỉ nhận hàng:</strong> <?= htmlspecialchars($order['address']) ?></p>
    <p><strong>Hình thức thanh toán:</strong> <?= htmlspecialchars($order['payment']) ?></p>
    <p><strong>Phí vận chuyển:</strong> <?= number_format($order['shipping'], 0, ',', '.') ?>đ</p>
    <p><strong>Tổng tiền:</strong> <?= number_format($order['total'], 0, ',', '.') ?>đ</p>
    <p><strong>Trạng thái:</strong> <?= ucfirst($order['status']) ?></p>
  </div>

  <h3>🛒 Chi tiết sản phẩm đã đặt</h3>
  <table>
    <tr>
      <th>Hình ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>Thành tiền</th>
    </tr>
    <?php while ($item = $items_result->fetch_assoc()): ?>
      <tr>
        <td><img src="/DQ_SHOP_SKELETON/DQ_Shop/img/<?php echo $item['image'] ?>" width="150px"></td>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= number_format($item['price'], 0, ',', '.') ?>đ</td>
        <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</td>
      </tr>
    <?php endwhile; ?>
  </table>

  <p><a href="/DQ_SHOP_SKELETON/DQ_Shop/index.php">← Về trang chủ</a></p>

</body>
</html>
