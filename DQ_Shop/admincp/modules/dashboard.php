<?php
include('config/config.php');
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}
$productCount = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tbl_sanpham"))['total'];
$orderCount   = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tbl_orders"))['total'];
$userCount    = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tbl_users"))['total'];
$contactCount = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tbl_lienhe"))['total'];
?>
<h1>📊 Thống kê tổng quan</h1>
<div class="card-container">
    <div class="card"><h3>Sản phẩm</h3><p><?= $productCount ?></p></div>
    <div class="card"><h3>Đơn hàng</h3><p><?= $orderCount ?></p></div>
    <div class="card"><h3>Khách hàng</h3><p><?= $userCount ?></p></div>
    <div class="card"><h3>Liên hệ</h3><p><?= $contactCount ?></p></div>
</div>

<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sản phẩm', 'Đơn hàng', 'Khách hàng', 'Liên hệ'],
            datasets: [{
                label: 'Số lượng',
                data: [<?= $productCount ?>, <?= $orderCount ?>, <?= $userCount ?>, <?= $contactCount ?>],
                backgroundColor: ['#4CAF50', '#2196F3', '#FF9800', '#E91E63']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Cho phép chỉnh chiều cao thủ công
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Biểu đồ thống kê DQ Shop' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>