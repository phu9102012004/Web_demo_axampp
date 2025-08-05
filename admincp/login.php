<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['email'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."'AND password = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count > 0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php");
        }else{
            echo "TK MK sai";
            header("Location:login.php");
        }
    }
?>
<main class="container">
  <!-- Form Đăng nhập -->
  <form method="post" >
    <h2>Đăng nhập</h2>
    <p>Chưa có tài khoản? <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/main/register.php">Đăng ký</a></p>
    <label>Email:
      <input type="email" name="email" required>
    </label>
    <label>Mật khẩu:
      <!-- !! phải có name="password" !! -->
      <input type="password" name="password" required>
    </label>
    <input type="submit" name = "dangnhap" value = "Đăng nhập">
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