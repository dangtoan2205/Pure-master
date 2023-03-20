<?php

require 'admin/root.php';
session_start();

// Phòng chống SQL Injection
if(isset($_POST)){
    foreach($_POST as $index=> $value){
        if(is_string($_POST[$index]))
        $_POST[$index] = htmlspecialchars($_POST[$index],ENT_QUOTES, "UTF-8");
    }   
}

if(isset($_GET)){
    foreach($_GET as $index=> $value){
        if(is_string($_GET[$index]))
        $_GET[$index] = htmlspecialchars($_GET[$index],ENT_QUOTES, "UTF-8");
    }   
}

$token = isset($_POST['token']) ? $_POST['token'] : '';
$password = md5(addslashes($_POST['password']));

$sql = "SELECT customer_id from forgot_password
    where `token` = '$token'";

$result = mysqli_query($connect, $sql);
if(!(mysqli_num_rows($result) === 1 )){
    header('location:login.php');
    exit;
}
$customer_id = mysqli_fetch_array($result)['customer_id'];

$sql = "UPDATE customers
SET customers.password = '$password', customers.token = null , customers.updated_at = now()
WHERE id = '$customer_id'";
mysqli_query($connect, $sql);

$sql = "DELETE from forgot_password
where `token` = '$token'";
mysqli_query($connect, $sql);

$_SESSION['success'] = "Đổi mật khẩu thành công!!";
header('location:login.php');
