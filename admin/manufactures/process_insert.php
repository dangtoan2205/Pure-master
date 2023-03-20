<?php
require '../root.php';
require '../check_super_admin_login.php';  


$name = trim(addslashes($_POST['name']));
$name = strip_tags($name);

$address = trim(addslashes($_POST['address']));

$phone = addslashes($_POST['phone']);
$phone = strip_tags($phone);

$photo = addslashes($_POST['photo']);
$photo = strip_tags($photo);



if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])){
    header('location:form_insert.php?error= Phải điền đủ thông tin');
}else{
    $sql = "SELECT * from manufactures
    where `name` = '$name'";
    $result = mysqli_query($connect, $sql);
    $sql = "INSERT INTO `manufactures`(`name`,`address` ,`phone`, `photo`) VALUES('$name', '$address', '$phone', '$photo')";
    mysqli_query($connect, $sql);
}

if(!(mysqli_num_rows($result) == 1)){
    header('location:index.php?success= Thêm thành công');
}else{
    header('location:index.php?error=Tên nhà sản xuất đã tồn tại');
}
mysqli_close($connect);
