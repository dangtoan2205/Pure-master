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

function current_url(){
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}

$email = strip_tags($_POST['email']);

if(empty($email)){
    $_SESSION['error'] = 'Vui lòng nhập email';
    header('location:forgot_password.php');
    exit;
}

$sql = "SELECT id,name from customers
where `email` = '$email'";
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) === 1 ){
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "DELETE from forgot_password
    where `customer_id ` = '$id'";
    mysqli_query($connect, $sql);
    $token = uniqid();
    $sql = "INSERT INTO forgot_password(customer_id ,token)
    VALUES('$id', '$token')";
    mysqli_query($connect, $sql);

    $link =  current_url() . '/phpnew/change_new_password.php?token='.$token;
    require './sendmail/server/send-mail.php';
    $title = "Change New Password";
    $content = "Bấm vào đây để mật khẩu của bạn trở nên mới lạ <a href='$link' >Click ngay hiệu lực trong 30s</a>";
    mySendMail($email, $title, $name, $content);
}else{ 
    $_SESSION['error'] = 'Email không tồn tại hoặc đã bị vô hiệu hóa';
    header('location:forgot_password.php');
    exit;
}
$_SESSION['success'] = 'Vui lòng kiểm tra email của bạn để đổi mật khẩu';
header('location:forgot_password.php');
mysqli_close($connect);




