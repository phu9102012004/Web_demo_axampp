<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<p>sửa danh mục sản phẩm</p>
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
 <table border="1" width="100%" style="border-collapse:collapse;">
    <?php
    while($row = mysqli_fetch_array($query_sua_danhmucsp)){
    ?>
    <tr>
      <td>Tên danh mục</td>
      <td><input type="text" value="<?php echo $row['tendanhmuc']?>"  name = "tendanhmuc"></td>
    </tr>
    <tr>
      <td>Thứ tự</td>
      <td><input type="text"value ="<?php echo $row['thutu']?>"  name = "thutu"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm">
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>