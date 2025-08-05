<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Liệt kê sản phẩm</p>
<form method="POST" action="modules/quanlysp/xuly.php">
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <td>Id</td>
      <td>Tên sản phẩm</td>
      <td>Nội dung</td>
      <td>Giá</td>
      <td>Số lượng</td>
      <td>Danh mục</td>
      <td>Hình ảnh</td>
      <td>Trạng thái</td>
      <td>Quản lý</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['noidung'] ?></td>
        <td><?php echo $row['gia'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><img src="../img/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php if ($row['trangthai'] == 1) {
              echo 'Kích hoạt';
            } else {
              echo 'Ẩn';
            } ?></td>
        <td>
          <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> |
          <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</form>