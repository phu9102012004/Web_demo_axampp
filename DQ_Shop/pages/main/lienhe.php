<p>Liên hệ</p>
<?php
include('admincp/config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten     = $_POST['ten'] ?? '';
    $email   = $_POST['email'] ?? '';
    $noidung = $_POST['noidung'] ?? '';
    $user_id = $_SESSION['id'] ?? null;
    $sql = "INSERT INTO tbl_lienhe(ten_nguoilienhe, email, noidung, user_id)
            VALUES ('".$ten."', '".$email."', '".$noidung."', '".$user_id."')";
}
?>
  <form method="POST" enctype="multipart/form-data">
    <table border="1" width="100%" style="border-collapse:collapse;">
      <tr>
        <td>Tên</td>
        <td><input type="text" name="ten"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email" ></td>
      </tr>
      <tr>
        <td>Nội dung</td>
        <td><input type="text" name="noidung"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;">
          <input type="submit" name="thongtinlienhe" value="Gửi liên hệ">
        </td>
      </tr>
    </table>
  </form>
