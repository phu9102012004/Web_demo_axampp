<?php
/* Hàm kiểm tra đăng nhập; $role='any' (mặc định) hoặc 'admin' hoặc 'user' */
function require_login(string $role = 'any'): void
{
    if (!isset($_SESSION['user'])) {
        header('Location: DQ_SHOP_SKELETON/DQ_Shop/pages/login.php');
        exit;
    }

    /* Nếu yêu cầu role cụ thể mà user không khớp → đưa họ về trang phù hợp */
    if ($role !== 'any') {
        $currentRole = $_SESSION['user']['role'] ?? 'user';
        if ($role !== $currentRole) {
            // admin vào trang user hoặc ngược lại
            if ($currentRole === 'admin') {
                header('Location: DQ_SHOP_SKELETON/DQ_Shop/admincp/index.php');
            } else {
                header('Location: DQ_SHOP_SKELETON/DQ_Shop/index.php');
            }
            exit;
        }
    }
}
