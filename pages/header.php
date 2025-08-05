<div class="header">
    <div class="topbar">
        <div class="container-t">
            <span>Chào mừng bạn đến với DQ_Shop!</span>
            <a href="index.php?quanly=checkout">Thanh toán</a>
        </div>
    </div>
    <header class="main-header">
        <div class="container flex between center">
            <a href="index.php" class="logo"><img src="img/logo.jpg" alt="Logo" width="150px"></a>
            <form action="index.php?quanly=timkiem" method="post" class="search-form">
                <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
                <button type="submit">TÌM KIẾM</button>
            </form>
            <div class="user-actions">
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="index.php?quanly=profile">Xin chào, <?= htmlspecialchars($_SESSION['user']['name']) ?></a>
                    <a class="a1" href="index.php?quanly=dangxuat">Đăng xuất</a>
                <?php else: ?>
                    <a class="a1" href="index.php?quanly=dangnhap">Đăng nhập</a><span>hoặc</span>
                    <a class="a1" href="index.php?quanly=dangky">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
</div>
