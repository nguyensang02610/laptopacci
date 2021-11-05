<?php include 'inc/header.php'; ?>
<?php include '../class/thongke.php'; ?>
<?php include '../class/chart.php'; ?>

<?php
    $format = new Format();
    $thongke = new thongke();
    //Doanh thu thang
    $doanhthu_thang = $thongke->thongke_doanhthu_thang();
    $result_doanhthu_thang = $doanhthu_thang->fetch_assoc();
    //Doanh thu nam
    $doanhthu_nam = $thongke->thongke_doanhthu_nam();
    $result_doanhthu_nam = $doanhthu_nam->fetch_assoc();
    //Đơn hàng cần xử lý
    $donhang = $thongke->donhang_canxuly();
    $result_donhang = $donhang->fetch_assoc();
    //Láy tất cá các đơn hàng
    $donhang_all = $thongke->donhang_all();
    $result_donhang_all = $donhang_all->fetch_assoc();
    //Lấy đơn hàng đã thành công
    $donhang_thanhcong = $thongke->donhang_thanhcong();
    $result_donhang_thanhcong = $donhang_thanhcong->fetch_assoc();

?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome Back</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu tháng (Hiện tại)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $format->currency_format($result_doanhthu_thang['Doanhthu']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Doanh thu năm (Hiện tại)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $format->currency_format($result_doanhthu_nam['Doanhthu']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tiến độ xử lý đơn hàng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $result_donhang['donhang'] ?> / <?php echo $result_donhang_all['donhang'] ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <?php
                                        $percent = ($result_donhang['donhang'] / $result_donhang_all['donhang']) * 100;
                                        ?>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percent ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đơn hàng đã giao thành công
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_donhang_thanhcong['donhang'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-check-lg fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chart" style="width: 1422px; height: 320px; background: white;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh số bán hàng theo hãng </h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="myBarChart" width="1420" height="352" style="display: block; height: 320px; width: 1420px;" class="chartjs-render-monitor"></canvas>
            </div>
            <hr>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script>
        var ctx = document.getElementById("chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php echo $thang ?>],
                datasets: [{
                    label: 'Doanh thu ',
                    data: [<?php echo $data2; ?>],
                    backgroundColor: 'transparent',
                    borderColor: '#de4242',
                    borderWidth: 3
                }]
            },

            options: {
                tooltips: {
                    mode: 'index'
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: 'rgb(255,255,255)',
                        fontSize: 16
                    }
                }
            }
        });
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $brand; ?>],
                datasets: [{
                    label: "Doanh số bán ra ",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [<?php echo $data1; ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'number'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],

                },
                legend: {
                    display: false
                },

            }
        });
    </script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Format tiền -->
    <?php include 'inc/footer.php'; ?>