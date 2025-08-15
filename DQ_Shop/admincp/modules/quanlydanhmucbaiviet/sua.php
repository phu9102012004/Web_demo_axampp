<?php
    $sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmuc_baiviet = '$_GET[iddanhmucbaiviet]' LIMIT 1";
    $query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
?>
<p>sửa danh mục bài viết</p>
<form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbaiviet=<?php echo $_GET['iddanhmucbaiviet']?>">
 <table border="1" width="100%" style="border-collapse:collapse;">
    <?php
    while($row = mysqli_fetch_array($query_sua_danhmucbv)){
    ?>
    <tr>
      <td>Tên danh mục</td>
      <td><input type="text" value="<?php echo $row['tendanhmuc_baiviet']?>"  name = "tendanhmucbaiviet"></td>
    </tr>
    <tr>
      <td>Thứ tự</td>
      <td><input type="text"value ="<?php echo $row['thutu']?>"  name = "thutu"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục sản phẩm">
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>