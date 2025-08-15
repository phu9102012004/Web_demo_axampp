<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/DQ_SHOP_SKELETON/DQ_Shop/admincp/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>DQ_Shop</h2>
            <a href="index.php">Dashboard</a>
            <a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a>
            <a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a>
            <a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a>
            <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
            <a href="index.php?action=quanlyweb&query=capnhat">Quản lý liên hệ</a>
            <a href="index.php?dangxuat=1">Đăng xuất </a>
        </div>

        <!-- Content -->
        <div class="content">
            <?php
            include("config/config.php");
            include("modules/main.php");
            ?>
        </div>
    </div>

</body>

</html>