<?php

require '../root.php';
require '../check_admin_login.php'; 


$id = $_GET['id'];


if(empty($_GET['id'])){
    header('location:index.php?error= Phải điền mã để xóa');
}else{
    $sql = "DELETE FROM `products` WHERE `id` = '$id'";
}

$query = mysqli_query($connect, $sql);
if ($query) {
header('location:index.php?success= Xóa thành công');
} else{
die(mysqli_error($connect));
}
mysqli_close($connect);