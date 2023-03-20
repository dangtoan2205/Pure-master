<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        .h1 {
            flex: 4;
            color: #ffff;

        }

        .sign {
            width: 500px;
            min-height: 500px;
            margin: 0 auto;
            padding-top: 80px;
            background-color: #cce6ff;
        }

        .text-status {
            font-size: 2rem;
            font-weight: 400;
            text-align: center;
            padding: 12px;
        }

        .text-status.text-error {
            color: red;
        }

        .text-status.text-success {
            color: green;
        }

        .sign form {
            max-width: 400px;
            margin: 0 auto;
            padding: 45px 20px;
        }

        .sign form label {
            display: block;
            font-size: 1.7rem;
            padding: 10px;
        }

        .sign form input {
            display: block;
            width: 100%;
            height: 34px;
            outline: none;
            border: none;
            padding-left: 10px;
            background-color: #ffff;

        }

        .sign form button {
            float: right;
            margin-top: 10px;
            padding: 10px;
            outline: none;
            border: none;
            background-color: #1a75ff;
            color: #ffff;
            font-size: 1.5rem;
        }

        .sign form a {
            display: block;
            float: right;
            padding: 10px;
            color: #1a75ff;
            font-size: 1.5rem;
        }

        .Remember {
            display: flex;
            align-items: center;
            margin-top: 12px;
        }

        .Remember span {
            display: inline-block;
            font-size: 1.2rem;
            color: #555;

        }

        .Remember input {
            display: inline-block !important;
            width: 14px !important;
            height: 24px !important;
            margin: 0 6px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- dau -->
        <div class="header header-fixed">
            <div class="header-container">
                <header class="header-top">
                    <div class="logo">
                        <a href="index.php">
                            <img src="./public/img/logo.png" alt="" class="img">
                        </a>
                    </div>
                    <div class="h1">
                        <h1>Quên mật khẩu</h1>
                    </div>
                </header>
            </div>
        </div>
        <div class="container">
            <div class="grid_full-width">
                <div class="sign">
                    <?php if (isset($_SESSION['error'])) { ?>
                        <h5 class="text-status text-error">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </h5>
                    <?php } ?>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <h5 class="text-status text-success">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h5>
                    <?php } ?>
                    <form action="process_forgot_password.php" method="post">
                        <label for="">Email</label>
                        <input type="email" name="email">
                        <br>
                        <button type="submit">
                            Gửi mail đổi mật khẩu
                        </button>
                    </form>

                </div>
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

        <?php include './partials/footer.php' ?>
    </div>
</body>

</html>