<p>Thêm sản phẩm</p>
<form method="POST" enctype="multipart/form-data" action="modules/quanlysp/xuly.php">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="tensanpham"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="5" name="noidung"></textarea></td>
    </tr>
    <tr>
      <td>Giá</td>
      <td><input type="text" name="gia"></td>
    <tr>
      <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm</td>
      <td>
        <select name ="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Trạng thái</td>
      <td>
        <select>
          <option>Kích hoạt</option>
          <option>Ẩn</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" name="themsanpham" value="Thêm sản phẩm">
      </td>
    </tr>
  </table>
</form>