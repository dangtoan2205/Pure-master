<?php

session_start();
require 'admin/root.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/view_all.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="wrapper">
        <?php include './partials/sticky.php' ?>
        <div class="container">
            <div class="grid_full-width">
                <?php include './partials/menu.php' ?>
                <div class="grid_full-width content">
                    <div class="content__brands">
                        <?php include './partials/slider.php' ?>
                        <div class="grid">
                            <div class="row">
                                <div class="col col-full">
                                    <div class="grid table_cart-info">
                                        <div class="row-table_cart">
                                            <div class="col-table col-table-5">
                                                <img class="order_img" src="./public/img/icon-logo-van-tai-1.jpg" alt="">
                                                <div class="order_success">
                                                    <h2>Bạn đã đặt hàng thành công</h2>
                                                    <a href="./info_order.php">-->   Kiểm tra thông tin sản phẩm</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include './partials/slidebar.php' ?>
                </div>
                <div class="footer">
                    <div class="grid_full-width">
                        <div class="grid">
                            <div class="row">
                                <div class="col col-4 col-mobi">
                                    <div class="logo logo-bottom ml-mobi">
                                        <img src="./public/img/logo2.png" alt="" class="img">
                                    </div>
                                    <div class="footer__text ml-mobi">
                                        <p>Vietpro Academy thành lập năm 2009. Chúng
                                            tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập
                                            trình Website & Mobile nhằm cung cấp cho thị
                                            trường CNTT Việt Nam những lập trình viên
                                            thực sự chất lượng, có khả năng làm việc độc
                                            lập, cũng như Team Work ở mọi môi trường đòi
                                            hỏi sự chuyên nghiệp cao. </p>
                                    </div>
                                </div>
                                <div class="col col-4 col-mobi">
                                    <div class="footer__about">
                                        <h3>Địa chỉ</h3>
                                    </div>
                                    <div class="footer__text">
                                        <p>
                                            B8A Võ Văn Dũng - Hoàng Cầu Đống Đa -
                                            Hà Nội
                                        </p>
                                        <p>
                                            Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà
                                            Nội
                                        </p>
                                    </div>
                                </div>
                                <div class="col col-4 col-mobi">
                                    <div class="footer__about">
                                        <h3>Dịch vụ</h3>
                                    </div>
                                    <div class="footer__text">
                                        <p>
                                            Bảo hành rơi vỡ, ngấm nước Care Diamond
                                        </p>
                                        <p>
                                            Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi
                                            mới
                                        </p>
                                    </div>
                                </div>
                                <div class="col col-4 col-mobi">
                                    <div class="footer__about">
                                        <h3>Liên hệ</h3>
                                    </div>
                                    <div class="footer__text">
                                        <p>Phone Sale: <a href="tel:+00 151515">(+84) 0988 550 5535</a></p>
                                        <p>Email: <a href="mailto:vietpro.edu.vn@gmail.com">vietpro.edu.vn@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './partials/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./public/js/js.js"></script>
    <script src="./public/js/slider.js"></script>
    <script src="./public/js/live-searchs.js"></script>
    
</body>

</html>