
<div class="main-wrapper">
    <div class="main-content">
        <?php
        if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }

        if ($tam == 'sanpham_full') {
            include("main/sanpham_full.php");
        } elseif ($tam == 'danhmucsanpham') {
            include("main/sanpham.php");
        } elseif ($tam == 'giohang') {
            include("main/cart.php");
        } elseif ($tam == 'tintuc') {
            include("main/tintuc.php");
        } elseif ($tam == 'lienhe') {
            include("main/lienhe.php");
        } elseif ($tam == 'sanpham') {
            include("main/chitietsanpham.php");
        } elseif ($tam == 'dangky') {
            include("main/register.php");
        } elseif ($tam == 'dangnhap') {
            include("main/login.php");
        } elseif ($tam == 'dangxuat') {
            session_start();
            session_unset();
            session_destroy();
            header("Location: /DQ_SHOP_SKELETON/DQ_Shop/index.php");
            exit;
        } elseif ($tam == 'profile') {
            include("main/profile.php");
        } elseif ($tam == 'timkiem') {
            include("main/timkiem.php");
        } elseif ($tam == 'checkout') {
            include("main/checkout.php");
        } else {
            include("main/maincontainer.php");
        }
        ?>
    </div>
</div>