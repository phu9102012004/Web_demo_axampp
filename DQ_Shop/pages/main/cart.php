<?php
$tongtien = 0;
?>
<h3>Giỏ hàng</h3>
<?php if (!empty($_SESSION['cart'])): ?>
    <table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $item):
            $thanhtien = $item['gia'] * $item['soluong'];
            $tongtien += $thanhtien;
        ?>
            <tr data-id="<?= $item['id'] ?>">
                <td><img src="img/<?= $item['hinhanh'] ?>" width="80"></td>
                <td><?= htmlspecialchars($item['tensanpham']) ?></td>
                <td><?= number_format($item['gia']) ?>₫</td>
                <td>
                    <input type="number" class="qty-input" data-id="<?= $item['id'] ?>" value="<?= $item['soluong'] ?>" min="1" style="width:50px;">
                </td>
                <td class="thanhtien"><?= number_format($thanhtien) ?>₫</td>
                <td><a href="pages/main/cart_remove.php?id=<?= $item['id'] ?>">Xóa</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="cart-summary">
        <div class="cart_summary_main">
            <a href="index.php?quanly=danhmuc" class="btn-continue">Tiếp tục mua hàng</a>

            <table class="summary-table">
                <tr>
                    <td>Tổng giá sản phẩm</td>
                    <td id="tongtien"><?= number_format($tongtien) ?>₫</td>
                </tr>
                <tr>
                    <td>Tiền vận chuyển</td>
                    <td>Tính khi thanh toán</td>
                </tr>
                <tr>
                    <td><b>TỔNG TIỀN THANH TOÁN</b></td>
                    <td class="total-final" id="tongtienthanhtoan"><?= number_format($tongtien) ?>₫</td>
                </tr>
            </table>
        </div>
        <div class="cart_summary_main_r">
            <?php if (!isset($_SESSION['user'])): ?>
                <?php $_SESSION['redirect_after_login'] = '/DQ_SHOP_SKELETON/DQ_Shop/index.php?quanly=checkout'; ?>
                <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/login.php" class="btn-checkout">Thanh toán ngay</a>
            <?php else: ?>
                <a href="/DQ_SHOP_SKELETON/DQ_Shop/index.php?quanly=checkout" class="btn-checkout">Thanh toán ngay</a>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <p>Giỏ hàng trống.</p>
<?php endif; ?>

<script>
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', function() {
            const id = this.dataset.id;
            const qty = this.value;

            fetch('pages/main/cart_update.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'id=' + id + '&qty=' + qty
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`tr[data-id="${id}"] .thanhtien`).innerText = data.thanhtien + '₫';
                        document.getElementById('tongtien').innerText = data.tongtien + '₫';
                        document.getElementById('tongtienthanhtoan').innerText = data.tongtien + '₫';
                    }
                });
        });
    });
</script>