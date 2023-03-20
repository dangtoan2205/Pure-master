<?php
session_start();

require 'admin/root.php';

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

$email = $_POST['email'] ?? null;
$email = strip_tags($email);
$password = md5(addslashes($_POST['password']));
$password = strip_tags($password);

// Chống tấn công SQL injection

// if (empty($_POST['email']) || empty($_POST['password'])) {
//     $_SESSION['error'] = 'Anh bạn à đừng hack nữa nhà mình còn gì đâu!!';
//     header('location:login.php');
//     exit;
// }
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $_SESSION['error'] = 'Email này lạ quá';
//     header('location:login.php');
//     exit;
// }

// if (isset($_POST['remember'])) {
//     $remember = true;
// } else {
//     $remember = false;
// }

$sql = "SELECT * from customers
where `email` = '$email' and `password` = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    $each = mysqli_fetch_array($result);
    if ($each['status'] > 0) {
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
        $id = $each['id'];
        if ($remember) {
            $token = uniqid('user_', true);
            $sql = "UPDATE customers
        SET 
        token = '$token'
        WHERE 
        id = '$id'";
            mysqli_query($connect, $sql);
            setcookie('remember', $token, time() + (86400 * 30), "/");
        }
    } else {
        $_SESSION['error'] = 'Tài khoản của bạn đã bị khóa';
        header('location:login.php');
    }
} else {
    $_SESSION['error'] = "Tài khoản không tồn tại";
}
header('location:login.php');
mysqli_close($connect);
