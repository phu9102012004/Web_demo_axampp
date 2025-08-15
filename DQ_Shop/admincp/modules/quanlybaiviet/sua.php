<?php
$sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
$query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
<p>Sửa bài viết</p>
<form method="POST" enctype="multipart/form-data" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <?php while ($row = mysqli_fetch_array($query_sua_bv)) { ?>
      <tr>
        <td>Tên bài viết</td>
        <td><input type="text" name="tenbaiviet" value="<?php echo $row['ten_baiviet'] ?>"></td>
      </tr>
      <tr>
        <td>Nội dung</td>
        <td><input type="text" name="noidung" value="<?php echo $row['noidung'] ?>"></td>
      </tr>
      <tr>
        <td>Tóm  tắt</td>
        <td><input type="text" name="tomtat" value="<?php echo $row['tomtat'] ?>"></td>
      </tr>
      <tr>
      <tr>
        <td>Hình ảnh</td>
        <td>
          <input type="file" name="hinhanh">
          <img src="../../../img/<?php echo $row['hinhanh'] ?>" width="150px">
        </td>
      </tr>
      <tr>
        <td>Danh mục bài viết</td>
        <td>
          <select name="danhmuc">
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmuc_baiviet DESC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
              ?>
              <option value="<?php echo $row_danhmuc['id_danhmuc_baiviet'] ?>" <?php if ($row_danhmuc['id_danhmuc_baiviet'] == $row['id_danhmuc_baiviet']) echo 'selected'; ?>>
                <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?>
              </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Trạng thái</td>
        <td>
          <select name="trangthai">
            <option value="1" <?php if ($row['trangthai'] == 1) echo 'selected'; ?>>Kích hoạt</option>
            <option value="0" <?php if ($row['trangthai'] == 0) echo 'selected'; ?>>Ẩn</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;">
          <input type="submit" name="suabaiviet" value="Sửa bài viết">
        </td>
      </tr>
    <?php } ?>
  </table>
</form>
