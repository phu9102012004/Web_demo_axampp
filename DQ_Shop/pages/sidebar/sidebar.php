<?php
$sql_product = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 1";
$query_product = mysqli_query($mysqli, $sql_product);
?>
<div class="sidebar">
    <div class="widget-t">
            <div class="widget-t-l"><h4 class="widget-title red">Hổ trợ trực tuyến</h4>
            </div>
    </div>
    <div class="support-box">
        <p>📞 Dương Chí Phú<br><strong>1900 6750</strong></p>
        <p>📞 Võ Thanh Toàn<br><strong>1900 6750</strong></p>
        <p>📞 Nguyễn Văn Quốc<br><strong>1900 6750</strong></p>
        <p>✉ Email: support@dqshop.vn</p>
    </div>
    <!-- ========== WIDGET SẢN PHẨM NỔI BẬT ========== -->
    <div class="widget">
        <div class="widget-t">
            <div class="widget-t-l"><h4 class="widget-title red">Sản phẩm nổi bật</h4>
            </div>
            <div class="widget-t-r">
                <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
                <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
            </div>
        </div>
        <div class="widget-featured" id="featList">
            <?php while ($row_product = mysqli_fetch_array($query_product)) { ?>
                <li>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                        <img src="img/<?php echo $row_product['hinhanh'] ?>" width="150px">
                        <p class="title_product">Tên sản phẩm: <?php echo $row_product['tensanpham'] ?></p>
                        <p class="price_product">Giá: <?php echo number_format($row_product['gia']) ?> vnđ</p>
                    </a>
                </li>
            <?php } ?>
        </div>
    </div>

    <!-- ========== WIDGET TIN TỨC ========== -->
    <div class="widget">
        <div class="widget-t">
            <div class="widget-t-l"><h4 class="widget-title red">Tin tức</h4>
            </div>
            <div class="widget-t-r">
                <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
                <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
            </div>
        </div>
        <?php foreach ($news as $n): ?>
            <article class="news-item">
                <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/post.php?id=<?= $n['id'] ?>">
                    <img src="/DQ_SHOP_SKELETON/DQ_Shop/img/<?= $n['thumb'] ?>" alt="">
                </a>
                <h5><a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/post.php?id=<?= $n['id'] ?>">
                        <?= $n['title'] ?></a></h5>
                <div class="meta">✎ <?= $n['author'] ?>📅 <?= date('d/m/Y', strtotime($n['created_at'])) ?></div>
                <p><?= mb_strimwidth(strip_tags($n['intro']), 0, 90, '…') ?></p>
                <a href="/DQ_SHOP_SKELETON/DQ_Shop/pages/post.php?id=<?= $n['id'] ?>">[Đọc tiếp...]</a>
            </article>
        <?php endforeach; ?>
    </div>
</div>