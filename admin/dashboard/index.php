<?php
require '../check_admin_login.php';
require '../root.php';

$month = date('Y-m');

$year = date('Y-m-d');

$sql = "SELECT SUM(total_price) as total FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m') = '$month' AND status = 1";
$result = mysqli_query($connect, $sql);
$eachMonth = mysqli_fetch_array($result);

$sql = "SELECT COUNT(*) FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m') = '$month' AND status < 2";
$result = mysqli_query($connect, $sql);
$totalMonth = mysqli_fetch_array($result)['COUNT(*)'];

$sql = "SELECT SUM(total_price) as total FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m-%d') >= (SELECT MIN(DATE_FORMAT(created_at, '%Y')) FROM `orders` WHERE status = 1 IN(DATE_FORMAT('$year', '%Y'))) AND status = 1";
$result = mysqli_query($connect, $sql);
$eachYear = mysqli_fetch_array($result);




$sql = "SELECT COUNT(*) FROM `admins` WHERE status = 1 AND lever != 1";
$result = mysqli_query($connect, $sql);
$result_user = mysqli_fetch_array($result)['COUNT(*)'];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>
    <title>Dashboard</title>

</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php if (empty($eachMonth['total'])) {
                                        echo '0đ';
                                    } else {
                                        echo currency_format($eachMonth['total']);
                                    } ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo currency_format($eachYear['total']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số đơn hàng trong tháng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold  text-gray-800"><?php echo $totalMonth ?>
                                            (kể cả đơn chưa được duyệt)
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
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Số lượng nhân sự</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (!empty($result_user)) { ?>
                                        <?php echo $result_user; ?>
                                    <?php } else { ?>
                                        0
                                    <?php } ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php
                include '../partials/chart-area.php';
                ?>
            </div>
            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../public/img/undraw_posting_photo.svg" alt="...">
                        </div>
                        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                            constantly updated collection of beautiful svg images that you can use
                            completely free and without attribution!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                            unDraw →</a>
                    </div>
                </div>

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with the
                            Bootstrap framework, especially the utility classes.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
    include '../partials/footer_view.php';

    include '../partials/js_link.php';
    ?>
    <script src="../public/vendor/chart.js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                    url: 'get_orders_total.php',
                    dataType: 'json',
                    data: {
                        days: 30
                    },
                })
                .done(function(response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: arrX,
                            datasets: [{
                                label: "Earnings",
                                lineTension: 0.3,
                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: arrY,
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
                                        unit: 'date'
                                    },
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 7
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        maxTicksLimit: 5,
                                        padding: 10,
                                        // Include a dollar sign in the ticks
                                        callback: function(value, index, values) {
                                            return number_format(value) + ' đ';
                                        }
                                    },
                                    gridLines: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + ' đ';
                                    }
                                }
                            }
                        }
                    });
                })
        });
    </script>
    <script src="../public/js/demo/chart-area-demo.js"></script>
</body>

</html>