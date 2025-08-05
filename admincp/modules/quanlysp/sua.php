<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<form method="POST" enctype="multipart/form-data" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <?php while ($row = mysqli_fetch_array($query_sua_sp)) { ?>
      <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensanpham" value="<?php echo $row['tensanpham'] ?>"></td>
      </tr>
      <tr>
        <td>Nội dung</td>
        <td><input type="text" name="noidung" value="<?php echo $row['noidung'] ?>"></td>
      </tr>
      <tr>
        <td>Giá</td>
        <td><input type="text" name="gia" value="<?php echo $row['gia'] ?>"></td>
      </tr>
      <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" value="<?php echo $row['soluong'] ?>"></td>
      </tr>
      <tr>
        <td>Hình ảnh</td>
        <td>
          <input type="file" name="hinhanh">
          <img src="../img/<?php echo $row['hinhanh'] ?>" width="150px">
        </td>
      </tr>
      <tr>
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc">
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
              ?>
              <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" <?php if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) echo 'selected'; ?>>
                <?php echo $row_danhmuc['tendanhmuc'] ?>
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
          <input type="submit" name="suasanpham" value="Sửa sản phẩm">
        </td>
      </tr>
    <?php } ?>
  </table>
</form>
