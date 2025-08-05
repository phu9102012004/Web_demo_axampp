<p>helo</p>
<p>helo</p>
<?php
$sql_lietke_dh = "SELECT * FROM tbl_order_items, tbl_sanpham WHERE tbl_order_items.product_id = tbl_sanpham.id_sanpham AND tbl_order_items.order_id ORDER BY tbl_order_items.order_id DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<p>Liệt kê sản phẩm</p>
<table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
        <td>STT</td>
        <td>Mã đơn hàng</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh</td>
        <td>Số Lượng</td>
        <td>Đơn giá</td>
        <td>Thanh tiền</td>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><img src="/DQ_SHOP_SKELETON/DQ_Shop/img/<?php echo $row['image'] ?>" width="150px"></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['price']*$row['quantity'] ?></td>
        </tr>

    <?php } ?>
</table>