<?php
require 'admin/root.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "UPDATE `orders` 
SET `status` = '2', `deleted_at` = now() 
WHERE `orders`.`id` = '$id'";
mysqli_query($connect, $sql);
header('location:info_order.php');
mysqli_close($connect);



