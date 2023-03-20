<?php

session_start();

$id = $_GET['id'];
if(!empty($_SESSION['cart'])){
    unset($_SESSION['cart'][$id]);
}
if(!empty($_SESSION['carts'])){
    unset($_SESSION['carts'][$id]);
}

header('location:view_cart.php');