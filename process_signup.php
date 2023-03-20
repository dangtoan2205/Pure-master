<?php
session_start();

require 'admin/root.php';

$name = trim(addslashes($_POST['name']));
$email = trim(addslashes($_POST['email']));
$password = md5(addslashes($_POST['password']));
$phone = addslashes($_POST['phone']);
$address = trim(addslashes($_POST['address']));
$gender = $_POST['gender'];

$sql = "SELECT count(*) from customers
where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
    $_SESSION['error'] = 'Email này đã tồn tại!';
    header('location:signup.php');
    exit;
}

$sql = "INSERT INTO customers(name, email, password, phone, gender, address)
VALUES ('$name', '$email', '$password', '$phone', '$gender', '$address')";
mysqli_query($connect, $sql);

require './sendmail/server/send-mail.php';
$title = "Đăng ký thành công";
$content = "Chào bạn đến với Shop zero còn muốn bay ac thì bấm vô tại đây:
<a href='https://www.google.com'>Link uy tín</a>";

mySendMail($email, $title, $name, $content);

$sql = "SELECT id from customers
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

mysqli_close($connect);
$_SESSION['success'] = "Tài khoản đăng ký thành công";
header('location:signup.php');