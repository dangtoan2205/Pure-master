<?php

session_start();

$id = $_GET['id'];
$type = $_GET['type'];

if ( $type === 'decre'){
    if($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    }else {
        unset($_SESSION['cart'][$id]);
    }
} else {
    if($_SESSION['cart'][$id]['quantity'] < 3){
        $_SESSION['cart'][$id]['quantity']++;
    }
}

