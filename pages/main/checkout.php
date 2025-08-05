<?php
require_once __DIR__ . '../../../admincp/config/config.php'; // đường dẫn đến file kết nối
$cart_items = [];
$tongtien = 0;

if (!empty($_SESSION['cart'])) {
  $ids = array_keys($_SESSION['cart']);
  $ids_sql = implode(",", array_map('intval', $ids));
  $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham IN ($ids_sql)";
  $result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id_sanpham'];
    $soluong = $_SESSION['cart'][$id]['soluong'];
    $row['soluong'] = $soluong;
    $row['thanhtien'] = $soluong * $row['gia'];
    $tongtien += $row['thanhtien'];
    $cart_items[] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang thanh toán</title>
</head>
<body>
  <div class="container">
  <h2>DQ_shop</h2>
  <div class="checkout">
    <div class="form-left">
      <h3>Thông tin nhận hàng</h3>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/logout.php"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a>
      <?php else: ?>
        <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/login.php?redirect=checkout"><i class="fa fa-sign-in-alt"></i> Đăng nhập</a>
      <?php endif; ?>
      <form action="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/dathang.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="hoten" placeholder="Họ và tên" required>
        <input type="tel" name="sdt" placeholder="Số điện thoại (tùy chọn)">
        <input type="text" name="diachi" placeholder="Địa chỉ (tùy chọn)">
        <select name="tinh">
          <option>Hà Nội</option>
          <option>TP.HCM</option>
          <option>Huế</option>
        </select>
        <select name="huyen">
          <option>Quận Ba Đình</option>
          <option>Quận 1</option>
          <option>Quận Hải Châu</option>
        </select>
        <textarea name="ghichu" placeholder="Ghi chú (tùy chọn)"></textarea>

        <h4>Vận chuyển</h4>
        <label><input type="radio" name="shipping" value="40000" checked> Giao hàng tận nơi - 40.000đ</label>

        <h4>Thanh toán</h4>
        <label><input type="radio" name="payment" value="cod" checked> Thanh toán khi giao hàng (COD)</label>
        <button type="submit" class="order-btn">ĐẶT HÀNG</button>
      </form>
    </div>

    <div class="form-right">
      <h3>Đơn hàng (<?php echo count($cart_items); ?> sản phẩm)</h3>
      <div class="order-items">
        <?php foreach ($cart_items as $item): ?>
          <div class="item">
            <p><?= htmlspecialchars($item['tensanpham']) ?> (x<?= $item['soluong'] ?>)</p>
            <p><?= number_format($item['thanhtien'], 0, ',', '.') ?>đ</p>
          </div>
        <?php endforeach; ?>
      </div>

      <input type="text" placeholder="Nhập mã giảm giá"> <button>Áp dụng</button>

      <div class="summary">
        <p>Tạm tính: <strong><?= number_format($tongtien, 0, ',', '.') ?>đ</strong></p>
        <p>Phí vận chuyển: <strong>40.000đ</strong></p>
        <p class="total">Tổng cộng: <strong><?= number_format($tongtien + 40000, 0, ',', '.') ?>đ</strong></p>
      </div>
      <a href="index.php?quanly=giohang" class="back">← Quay về giỏ hàng</a>
    </div>
  </div>
</div>
</body>
</html>
