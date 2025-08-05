<p>helo</p>
<?php
$sql_lietke_dh = "SELECT * FROM tbl_orders, tbl_users WHERE tbl_orders.user_id = tbl_users.id ORDER BY tbl_orders.id DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<p>Liệt kê sản phẩm</p>
<table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
        <td>STT</td>
        <td>Mã đơn hàng</td>
        <td>Tên khách hàng</td>
        <td>Địa chỉ</td>
        <td>Email</td>
        <td>Số điện thoại</td>
        <td>Quản lý</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tenkhachhang'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td>
                <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
            </td>
        </tr>

    <?php } ?>
</table>