<?php
session_start();
ob_start();
require("admincp/config/config.php");
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DQ_SHOP_SKELETON/DQ_Shop/css/styles.css">
    <link rel="stylesheet" href="/DQ_SHOP_SKELETON/DQ_Shop/css/breadcrumb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="/DQ_Shop/js/"></script>
    <title>DQ_Shop</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include("includes/auth.php");
        include("pages/header.php");
        include("pages/menu.php");
        include("includes/breadcrumb.php");
        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>
</body>

</html>
