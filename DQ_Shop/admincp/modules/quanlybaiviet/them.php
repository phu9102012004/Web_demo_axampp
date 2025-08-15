<p>Thêm bài viết</p>
<form method="POST" enctype="multipart/form-data" action="modules/quanlybaiviet/xuly.php">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <td>Tên bài viết</td>
      <td><input type="text" name="tenbaiviet"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="5" name="noidung"></textarea></td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="5" name="tamtat"></textarea></td>
    </tr>
    <tr>
      <td>Danh mục bài viết</td>
      <td>
        <select name ="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmuc_baiviet DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Trạng thái</td>
      <td>
        <select name="trangthai">
          <option>Kích hoạt</option>
          <option>Ẩn</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" name="thembaiviet" value="Thêm bài viết">
      </td>
    </tr>
  </table>
</form>