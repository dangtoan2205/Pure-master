<?php
require 'root.php';
session_start();

// Phòng chống SQL Injection

// if (isset($_POST)) {
//     foreach ($_POST as $index => $value) {
//         if (is_string($_POST[$index]))
//             $_POST[$index] = htmlspecialchars($_POST[$index], ENT_QUOTES, "UTF-8");
//     }
// }

// if (isset($_GET)) {
//     foreach ($_GET as $index => $value) {
//         if (is_string($_GET[$index]))
//             $_GET[$index] = htmlspecialchars($_GET[$index], ENT_QUOTES, "UTF-8");
//     }
// }


$email = $_POST['email'];
$email = strip_tags($email);
$password = md5(addslashes($_POST['password']));
$password = strip_tags($password);

//validate

// if (empty($_POST['email']) || empty($_POST['password'])) {
//     $_SESSION['error'] = 'Anh bạn à đừng hack nữa nhà mình còn gì đâu!!';
//     header('location:login.php');
//     exit;
// }

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $_SESSION['error'] = 'Vui lòng nhập đúng định dạng email';
//     header('location:index.php');
//     exit;
// }


$sql = "SELECT * from admins
where `email` = '$email' and `password` = '$password'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 1) {
    $each = mysqli_fetch_array($result);

    $_SESSION['idAdmin'] = $each['id'];
    $_SESSION['fullname'] = $each['fullname'];
    $_SESSION['lever'] = $each['lever'];

    if ($each['status'] > 0) {
        header('location:dashboard/index.php');
    } else {
        $_SESSION['error'] = 'Tài khoản của bạn đã bị khóa';
        header('location:logout.php');
    }
    exit;
}
$_SESSION['error'] = 'Tài khoản không tồn tại';
header('location:index.php');

mysqli_close($connect);
