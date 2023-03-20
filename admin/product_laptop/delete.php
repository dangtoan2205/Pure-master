<?php

require '../root.php';

$id = $_GET['id'];


if(empty($_GET['id'])){
    header('location:index.php?error= Phải điền mã để xóa');
}else{
    $sql = "DELETE FROM `product_laptop` WHERE `id` = '$id'";
    mysqli_query($connect, $sql);
    $sql = "DELETE FROM `config_product_laptop` WHERE `pro_laptop_id` = '$id'";
    mysqli_query($connect, $sql);
}

$query = mysqli_query($connect, $sql);
if ($query) {
header('location:index.php?success= Xóa thành công');
} else{
die(mysqli_error($connect));
}
mysqli_close($connect);