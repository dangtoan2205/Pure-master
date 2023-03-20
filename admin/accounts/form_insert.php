<?php
session_start();
if(empty($_SESSION['lever'] > 0)){
    header('location:../index.php');
}
require '../root.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>

    <title>Advertise - insert</title>
    <style>
        label.error { 
            color: red !important;
            margin-top: 8px;
        }
        .error{
            width:100% !important;
            font-size: 1rem !important;
            line-height: 1.3;
        }
    </style>

</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>

    <div class="container-fluid">
        <?php
        require '../menu.php';
        ?>
        <div class="row">
            <div class="col">
                <p> This is add account page !</p>
                <a class="btn btn-primary" href="index.php">List account</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form id="form_signup" class="border p-3" action="process_insert.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="">Username(*)</label>
                        <input class="form-control" type="text" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Password(*)</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Email(*)</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Fullname(*)</label>
                        <input class="form-control" type="text" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Phone(*)</label>
                        <input class="form-control" type="text" name="phone">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="gender">
                            <option selected="selected" value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    include '../partials/footer_view.php';

    include '../partials/js_link.php';
    ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $().ready(function() {
            $("#form_signup").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "username": {
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
                    "fullname": "required",
                },
                messages: {
                    "username": {
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
                    "fullname": {
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
</body>

</html>