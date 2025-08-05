<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
$cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'soluong')) : 0;
?>
<div class="menu">
    <nav class="menu">
        <div class="container">
            <ul class="nav">
                <div class="nav-l">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="dropdown">
                        <a href="index.php?quanly=sanpham_full">Sản phẩm</a>
                        <ul class="dropdown-menu">
                            <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
                                <li>
                                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']; ?>">
                                        <?php echo $row_danhmuc['tendanhmuc']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
                    <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
                </div>
                <div class="nav-r">
                    <li class="nav-cart">
                        <a href="index.php?quanly=giohang" class="cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-count"><?php echo $cartCount; ?></span>
                        </a>
                        <div class="cart-preview">
                            <?php
                            if (!empty($_SESSION['cart'])) {
                                $ids = array_keys($_SESSION['cart']);
                                $in = implode(",", array_map('intval', $ids));
                                $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham IN ($in)";
                                $query = mysqli_query($mysqli, $sql);
                                $total = 0;
                                while ($item = mysqli_fetch_array($query)) {
                                    $qty = $_SESSION['cart'][$item['id_sanpham']]['soluong'];
                                    $subtotal = $item['gia'] * $qty;
                                    $total += $subtotal;
                            ?>
                                    <div class="cart-item">
                                        <img src="img/<?php echo $item['hinhanh']; ?>" alt="">
                                        <div class="info">
                                            <strong><?php echo $item['tensanpham']; ?></strong>
                                            <p><?php echo number_format($item['gia']); ?>₫</p>
                                            <div class="qty-box">Số lượng: <?php echo $qty; ?></div>
                                        </div>
                                        <a href="pages/main/cart_remove.php?id=<?php echo $item['id_sanpham']; ?>" class="remove">🗑️</a>
                                    </div>
                            <?php
                                }
                            ?>
                                <div class="cart-total">
                                    Tổng cộng: <strong><?php echo number_format($total); ?>₫</strong>
                                </div>
                                <div class="cart-actions">
                                    <a href="index.php?quanly=giohang" class="btn-red">Giỏ hàng</a>
                                    <a href="index.php?quanly=checkout" class="btn-red">Thanh toán</a>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</div> 