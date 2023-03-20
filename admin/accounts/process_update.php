<?php

session_start();
if(empty($_SESSION['lever'] > 0)){
    header('location:../index.php');
}
require '../root.php';

$id = $_POST['id'];

$username = addslashes($_POST['username']);
$username = strip_tags($username);

$email = trim(addslashes($_POST['email']));
$email = strip_tags($email);

$fullname = addslashes($_POST['fullname']);
$fullname = strip_tags($fullname);


$phone = addslashes($_POST['phone']);
$gender = $_POST['gender'];
$status = $_POST['status'];
$lever = $_POST['lever'];
if(empty($_POST['id'])){
    header('location:form_update.php?error= Phải điền mã để sửa');
}
if(!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['fullname']) || !empty($_POST['phone'])){
    $sql = "UPDATE `admins`
    SET
    username = '$username',
    email = '$email',
    fullname = '$fullname',
    phone = '$phone',
    gender = '$gender',
    status = '$status',
    lever = '$lever',
    updated_at = now()
    WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location:index.php?success= Sửa thành công');
    } else{
        mysqli_error($connect);
        header("location:form_update.php?id=$id&error= Email đã tồn tại");
    }
}else{
    header("location:form_update.php?id=$id&error= Phải điền đủ thông tin");
}
mysqli_close($connect);


