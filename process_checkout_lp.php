<?php 
session_start();
require 'admin/root.php';

$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];

$carts = $_SESSION['carts'] ?? null;

$customer_id = $_SESSION['id'];
$status = 0;

$total_price = 0;
if(!empty($_SESSION['carts'])){
    foreach($carts as $each){
        $total_price += $each['quantity'] * $each['price'];
    }
    $sql = "INSERT INTO `orders`( customer_id, name_receiver, phone_receiver, address_receiver, status, total_price)
    VALUES ('$customer_id','$name_receiver', '$phone_receiver', '$address_receiver', '$status', '$total_price')";
    mysqli_query($connect, $sql);
    $sql = "SELECT max(id) from orders where customer_id = '$customer_id'";
    $result = mysqli_query($connect, $sql);
    $order_id = mysqli_fetch_array($result)['max(id)'];
    foreach($carts as $product_lp_id => $each){
        $quantity = $each['quantity'];
        $sql = "INSERT INTO `order_detail`(order_id, product_id, product_lp_id, quantity) VALUES ('$order_id','0','$product_lp_id','$quantity')";
        mysqli_query($connect, $sql);
    }
    unset($_SESSION['carts']);
}

mysqli_close($connect);

header('location:view_order.php');