<?php

require '../root.php';
require '../check_super_admin_login.php'; 

$id = $_POST['id'];

$name = addslashes($_POST['name']);
$name = strip_tags($name);

$address = trim(addslashes($_POST['address']));

$phone = addslashes($_POST['phone']);
$phone = strip_tags($phone);

$photo = addslashes($_POST['photo']);
$photo = strip_tags($photo);
$rules = $_POST['rules'];

if(empty($_POST['id'])){
    header('location:form_update.php?error= Phải điền mã để sửa');
}elseif(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])){
    header("location:form_update.php?id=$id&error= Phải điền đủ thông tin");
}else{
    $sql = "SELECT * from manufactures
    where `name` = '$name'";
    $result = mysqli_query($connect, $sql);

    $sql = "UPDATE `manufactures`
    SET
    name = '$name',
    address = '$address',
    phone = '$phone',
    photo = '$photo',
    rules = '$rules'
    WHERE id = '$id'";
    mysqli_query($connect, $sql);
}

if(!(mysqli_num_rows($result) == 1)){
    header('location:index.php?success= Sửa thành công');
}else{
    header('location:index.php?error=Tên nhà sản xuất đã tồn tại');
}
mysqli_close($connect);