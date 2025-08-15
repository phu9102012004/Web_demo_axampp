<?php
session_start();
require_once __DIR__ . '/../../admincp/config/config.php';
if (isset($_POST['dangnhap'])) {
  $taikhoan = mysqli_real_escape_string($mysqli, $_POST['email']);
  $matkhau = $_POST['password'];    
  $sql = "SELECT * FROM tbl_users WHERE email = '$taikhoan' LIMIT 1";
  $row = mysqli_query($mysqli, $sql);
  $user = mysqli_fetch_assoc($row);
  if ($user && password_verify($matkhau, $user['matkhau'])) {
    // Sau khi kiểm tra đăng nhập thành công
    $_SESSION['user_id'] = $row['id']; // Lưu id vào session
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['tenkhachhang'],
      'email' => $user['email']
    ];
    if (isset($_SESSION['redirect_after_login'])) {
      $redirect_url = $_SESSION['redirect_after_login'];
      unset($_SESSION['redirect_after_login']);
      header("Location: $redirect_url");
      exit;
    } else {
if ($user) {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['tenkhachhang'],
      'email' => $user['email']
    ];
    // Nếu có redirect thì chuyển về đó
    if (!empty($_GET['redirect']) && $_GET['redirect'] == 'checkout') {
        header("Location: /DQ_SHOP_SKELETON/DQ_Shop/pages/main/checkout.php");
    } else {
        header("Location: /DQ_SHOP_SKELETON/DQ_Shop/index.php");
    }
    exit;
}

    }
  } else {
    $error = "Tài khoản hoặc mật khẩu không đúng.";
  }
}

?>

<main class="container">
  <!-- Form Đăng nhập -->
  <form method="post">
    <h2>Đăng nhập</h2>
    <p>Chưa có tài khoản? <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/register.php">Đăng ký</a></p>
    <label>Email:
      <input type="email" name="email" required>
    </label>
    <label>Mật khẩu:
      <!-- !! phải có name="password" !! -->
      <input type="password" name="password" required>
    </label>
    <input type="submit" name="dangnhap" value="Đăng nhập">
    <p><a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/removepassword.php">Quên mật khẩu</a></p>
    <p class="text-muted">Hoặc đăng nhập bằng</p>
    <div class="flex center gap">
      <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/login.php?facebook=1" class="btn btn-facebook">
        <i class="fa-brands fa-facebook"></i>
      </a>
      <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/login.php?google=1" class="btn btn-google">
        <i class="fa-brands fa-google"></i>
      </a>
    </div>
  </form>
</main>
<?php
