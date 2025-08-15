<?php
$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc_baiviet = tbl_danhmucbaiviet.id_danhmuc_baiviet ORDER BY id_baiviet DESC";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>
<p>Liệt kê bài viết</p>
<form method="POST" action="modules/quanlybaiviet/xuly.php">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <td>Id</td>
      <td>Tên bài viết</td>
      <td>Nội dung</td>
      <td>Tóm tắt</td>
      <td>Danh mục</td>
      <td>Hình ảnh</td>
      <td>Trạng thái</td>
      <td>Quản lý</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_bv)) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ten_baiviet'] ?></td>
        <td><?php echo $row['noidung'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
        <td><img src="../img/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php if ($row['trangthai'] == 1) {
              echo 'Kích hoạt';
            } else {
              echo 'Ẩn';
            } ?></td>
        <td>
          <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xóa</a> |
          <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</form>