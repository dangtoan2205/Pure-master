<?php
require '../check_admin_login.php'; 

require '../root.php';

$id = $_GET["id"]; 
$status = $_GET["status"];

if(empty($_GET['id'])){
    header('location:index.php');
        exit;
}

$sql = "UPDATE orders 
    SET 
    status = '$status'
    WHERE id = '$id'";

$query = mysqli_query($connect, $sql);
if ($query) {
    header('location:index.php?success= Sửa thành công');
} else{
    die(mysqli_error($connect));
}
mysqli_close($connect);
