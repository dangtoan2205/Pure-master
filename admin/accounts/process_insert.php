<?php
session_start();
if(empty($_SESSION['lever'] > 0)){
    header('location:../index.php');
}
require '../root.php';

$username = trim(addslashes($_POST['username']));
$password = md5(addslashes($_POST['password']));
$email = trim(addslashes($_POST['email']));
$fullname = trim(addslashes($_POST['fullname']));
$phone = addslashes($_POST['phone']);
$gender = $_POST['gender'];
if(!empty($_POST['name']) || !empty($_POST['address']) || !empty($_POST['phone']) || !empty($_POST['photo'])){
    $sql = "SELECT count(*) from admins
    where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];
    if($number_rows == 1){
        header('location:index.php?error= Email da ton tai');
        exit;
    }
    $sql = "INSERT INTO admins(username, password, email, phone, fullname, gender)
    VALUES ('$username', '$password', '$email', '$phone', '$fullname', '$gender')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location:index.php?success= Thêm thành công');
    } else{
        die(mysqli_error($connect));
    }
}else{
    header('location:index.php');
}

mysqli_close($connect);
