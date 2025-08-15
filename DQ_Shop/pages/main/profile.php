<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?quanly=dangnhap");
    exit;
}

$user = $_SESSION['user'];
$page = $_GET['view'] ?? 'info';

// Lấy đơn hàng với mysqli
$uid = intval($user['id']);
$sql_orders = "SELECT * FROM tbl_orders WHERE user_id = '$uid' ORDER BY id DESC";
$query_orders = mysqli_query($mysqli, $sql_orders);
?>
<main class="container flex" style="gap:40px;margin-top:20px">
    <div class="tong">
        <aside style="width:220px">
            <h2 style="font-size:24px;margin-bottom:6px">TRANG TÀI KHOẢN</h2>
            <p>Xin chào, <span style="color:#c00;font-weight:600"><?php echo htmlspecialchars($user['name']); ?></span></p>
            <ul class="acc-menu">
                <li class="<?= $page == 'info' ? 'active' : ''; ?>">
                    <a href="index.php?quanly=profile&view=info">Thông tin tài khoản</a>
                </li>
                <li class="<?= $page == 'orders' ? 'active' : ''; ?>">
                    <a href="index.php?quanly=profile&view=orders">Đơn hàng của bạn</a>
                </li>
                <li class="<?= $page == 'pass' ? 'active' : ''; ?>">
                    <a href="index.php?quanly=profile&view=pass">Đổi mật khẩu</a>
                </li>
                <li class="<?= $page == 'addr' ? 'active' : ''; ?>">
                    <a href="index.php?quanly=profile&view=addr">Sổ địa chỉ</a>
                </li>
            </ul>
        </aside>

        <section style="flex:3">
            <?php if ($page == 'info') : ?>
                <h2>THÔNG TIN TÀI KHOẢN</h2>
                <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

            <?php elseif ($page == 'orders') : ?>
                <h2>ĐƠN HÀNG CỦA BẠN</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Đơn hàng</th>
                            <th>Ngày</th>
                            <th>Địa chỉ</th>
                            <th>Giá trị đơn</th>
                            <th>TT thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($query_orders) === 0) : ?>
                            <tr>
                                <td colspan="5" style="text-align:center;padding:18px">Không có đơn hàng nào.</td>
                            </tr>
                            <?php else : while ($order = mysqli_fetch_array($query_orders)) : ?>
                                <tr>
                                    <td><a href="pages/main/order_success.php?id=<?php echo $order['id']; ?>">#<?php echo $order['id']; ?></a></td>
                                    <td><?php echo htmlspecialchars($order['address']); ?></td>
                                    <td style="color:#c80000;font-weight:700"><?php echo number_format($order['total']); ?>₫</td>
                                    <td><?php echo ucfirst($order['status']); ?></td>
                                </tr>
                        <?php endwhile;
                        endif; ?>
                    </tbody>
                </table>

            <?php elseif ($page == 'pass') : ?>
                <h2>ĐỔI MẬT KHẨU</h2>
                <form method="post" action="pages/main/change_pass.php" style="max-width:400px">
                    <input type="password" name="old" placeholder="Mật khẩu cũ" required>
                    <input type="password" name="new" placeholder="Mật khẩu mới" required>
                    <input type="password" name="new2" placeholder="Nhập lại mật khẩu" required>
                    <button class="btn">Cập nhật</button>
                </form>

            <?php elseif ($page == 'addr') : ?>
                <h2>SỔ ĐỊA CHỈ</h2>
                <p>Bạn chưa lưu địa chỉ nào.</p>

            <?php endif; ?>
        </section>
    </div>
</main>