<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        label.error{
			color: red;
		}
        .h1 {
            flex: 4;
            color: #ffff;
        }

        .sign {
            width: 500px;
            min-height: 600px;
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
            max-width: 500px;
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

        #gender {
            padding: 6px 12px;
            font-size: 1.4rem;
            outline: none;
            border: none;
            cursor: pointer;
            border-radius: 3px;
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
                        <h1>Đăng Ký</h1>
                    </div>
                </header>
            </div>
        </div>
        <!-- giua -->
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
                    <form id="form_signup" method="post" action="process_signup.php">
                        <a href="login.php">Đăng Nhập</a>
                        <label for="">Name</label>
                        <input type="text" name="name" id="name">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone">
                        <label for="">Address</label>
                        <input type="text" name="address" id="address">
                        <label for="">Gender</label>
                        <select id="gender" name="gender">
                            <option selected="selected" value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        <button type="submit">Đăng ký</button>
                    </form>
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
</body>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $().ready(function() {
        $("#form_signup").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "name": {
                    required: true,
                    maxlength: 15
                },
                "email": {
                    required: true,
                    email: true
                },
                "password": {
                    required: true,
                    validatePassword: true,
                    minlength: 6
                },
                "phone": {
                    required: true,
                    validatePhone: true,
                },
                address: "required",
            },
            messages: {
                "name": {
                    required: "Vui lòng nhập tên của bạn",
                    maxlength: "Nhập tối đa 15 kí tự"
                },
                "email": {
                    required: "Vui lòng nhập email của bạn",
                    email: "Eamil không đúng định dạng!!"
                },
                "password": {
                    required: "Vui lòng nhập mật khẩu của bạn"
                },
                "phone": {
                    required: "Vui lòng nhập số điện thoại của bạn",
                },
                "address": {
                    required: "Vui lòng nhập địa chỉ của bạn"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        $.validator.addMethod("validatePassword", function(value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/i.test(value);
        }, "Hãy nhập password từ 6 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $.validator.addMethod("validatePhone", function(value, element) {
            return this.optional(element) || /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/i.test(value);
        }, "Vui lòng nhập đúng định dạng số điện thoại!!");
    });
</script>

</html>