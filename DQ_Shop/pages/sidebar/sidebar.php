<?php
$sql_product = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 1";
$query_product = mysqli_query($mysqli, $sql_product);
$sql_news = "
    SELECT 
        id_baiviet   AS id,
        ten_baiviet  AS title,
        noidung      AS intro,
        tomtat,
        hinhanh      AS thumb
    FROM tbl_baiviet
    ORDER BY id_baiviet DESC
    LIMIT 1
";
$news = [];
if ($result_news = mysqli_query($mysqli, $sql_news)) {
    while ($n = mysqli_fetch_assoc($result_news)) {
        // Bạn không có cột created_at, nên tạm dùng ngày hiện tại
        $n['author'] = $n['tomtat'] ?: 'Biên tập';
        $n['created_at'] = date('Y-m-d');
        $news[] = $n;
    }
}
?>
<div class="sidebar">
    <div class="widget-t">
        <div class="widget-t-l">
            <h4 class="widget-title red">Hổ trợ trực tuyến</h4>
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
            <div class="widget-t-l">
                <h4 class="widget-title red">Sản phẩm nổi bật</h4>
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
            <div class="widget-t-l">
                <h4 class="widget-title red">Tin tức</h4>
            </div>
            <div class="widget-t-r">
                <button class="nav-btn prev" onclick="slideFeat(-1)">&#8249;</button>
                <button class="nav-btn next" onclick="slideFeat(1)">&#8250;</button>
            </div>
        </div>
        <div class="widget-featured" id="newsList">
            <?php if (!empty($news)) : ?>
                <?php foreach ($news as $n): ?>
                    <article class="news-item">
                        <a href="index.php?quanly=tintuct&id=<?= (int)$n['id'] ?>">
                            <img src="/DQ_SHOP_SKELETON/DQ_Shop/img/<?= htmlspecialchars($n['thumb']) ?>" alt=""width="170px">
                        </a>
                        <h5>
                            <a href="index.php?quanly=tintuct&id=<?= (int)$n['id'] ?>">
                                <?= htmlspecialchars($n['title']) ?>
                            </a>
                        </h5>
                        <div class="meta">✎ <?= htmlspecialchars($n['author']) ?> · 📅 <?= date('d/m/Y', strtotime($n['created_at'])) ?></div>
                        <p><?= mb_strimwidth(strip_tags($n['intro']), 0, 90, '…', 'UTF-8') ?></p>
                        <a href="index.php?quanly=tintuct&id=<?= (int)$n['id'] ?>">[Đọc tiếp...]</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có tin tức.</p>
            <?php endif; ?>
        </div>
    </div>
</div>