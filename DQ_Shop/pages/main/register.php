<?php

if (isset($_POST['dangky'])) {
    $tenkhachhang = trim($_POST['full_name']);
    $email        = trim($_POST['email']);
    $dienthoai    = trim($_POST['phone']);
    $diachi       = trim($_POST['diachi']);
    $matkhau      = $_POST['password'];
    $confirm      = $_POST['confirm'];

    if ($matkhau !== $confirm) {
        echo 'Mật khẩu nhập lại không khớp.';
    } else {
        $matkhau_hash = password_hash($matkhau, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO tbl_users (tenkhachhang, email, dienthoai, diachi, matkhau) VALUES ('$tenkhachhang', '$email','$dienthoai', '$diachi', '$matkhau_hash')");

        if ($stmt->execute()) {
            echo 'Đăng ký thành công.';
        } else {
            echo 'Lỗi khi đăng ký: ' . $stmt->error;
        }
    }
}
?>

<main class="container">
    <form method="post">
        <h2>Đăng ký</h2>
        <p class="text-muted">Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập</a></p>
        <label>Họ tên
            <input name="full_name" required>
        </label>
        <label>Email
            <input type="email" name="email" required>
        </label>
        <label>Số điện thoại
            <input name="phone" required>
        </label>
        <label>Thành phố
            <input name="diachi" required>
        </label>
        <label>Mật khẩu
            <input type="password" name="password" required>
        </label>
        <label>Nhập lại mật khẩu
            <input type="password" name="confirm" required>
        </label>

        <button class="btn" name="dangky">Đăng ký</button>

        <p class="text-muted">Hoặc đăng nhập bằng</p>
        <div class="flex center gap">
            <a href="/pages/login.php?facebook=1" class="btn btn-facebook">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="/pages/login.php?google=1" class="btn btn-google">
                <i class="fa-brands fa-google"></i>
            </a>
        </div>
    </form>
</main>