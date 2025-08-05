<?php
if (session_status() === PHP_SESSION_NONE) session_start();
/* Cấu hình & DB */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main class="container">
  <!-- Form quên matkhau -->
  <form method="post" class="auth-form">
    <h2>Đăng nhập</h2>
    <p>Chưa có tài khoản? <a href="<?= BASE_URL ?>/pages/register.php">Đăng ký tại đây</a></p>
    <label>Email:
      <input type="email" name="email" required>
    </label>
    <button class="btn">Lấy lại mật khẩu</button>
    <p class="text-muted">Hoăc đăng nhập bằng</p>
    <div class="flex center gap">
      <a href="<?= BASE_URL ?>/pages/login.php?facebook=1" class="btn btn-facebook">
        <i class="fa-brands fa-facebook"></i>
      </a>
      <a href="<?= BASE_URL ?>/pages/login.php?google=1" class="btn btn-google">
        <i class="fa-brands fa-google"></i>
      </a>
    </div>
  </form>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>