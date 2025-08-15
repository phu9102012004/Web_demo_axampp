<?php
$sql_lh = "SELECT lh.*, u.tenkhachhang 
           FROM tbl_lienhe lh
           LEFT JOIN tbl_users u ON lh.user_id = u.id
           ORDER BY lh.id_lienhe DESC";
$query_lh = mysqli_query($mysqli, $sql_lh);
?>
<p>Quản lý Liên hệ</p>
<table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Người liên hệ</th>
        <th>Email</th>
        <th>Nội dung</th>
        <th>Thao tác</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($query_lh)) { ?>
    <tr>
        <td><?php echo $row['id_lienhe']; ?></td>
        <td><?php echo $row['ten_nguoilienhe']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['noidung']; ?></td>
        <td><a href="index.php?action=quanlyweb&query=sua&id_lienhe=<?php echo $row['id_lienhe']; ?>">Sửa</a></td>
    </tr>
    <?php } ?>
</table>
