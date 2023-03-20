<?php
session_start();
// unset($_SESSION['carts']);
$id = $_GET['lap_id'];

if(empty($_SESSION['carts'][$id])){
    require 'admin/root.php';
    $sql = "SELECT * from product_laptop where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['carts'][$id]['name'] = $each['name'];
    $_SESSION['carts'][$id]['photo'] = $each['photo'];
    $_SESSION['carts'][$id]['price'] = $each['price'];
    $_SESSION['carts'][$id]['quantity'] = 1;
}else {
    if($_SESSION['carts'][$id]['quantity'] < 3){
        $_SESSION['carts'][$id]['quantity']++;
    }
}

header('location:view_cart.php');