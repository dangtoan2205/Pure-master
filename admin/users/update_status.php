<?php
require '../root.php';
session_start();
if(empty($_SESSION['lever'] == 1)){
    header('location:../index.php');
}else{
    $id = $_GET['id'];
    $status = $_GET['status'];
    if(!empty($_GET['id']) || !empty($_GET['status'])){
        $sql = "UPDATE customers 
        SET 
        status = '$status',
        deleted_at = now()
        WHERE id = '$id'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            header('location:index.php?success= Sửa thành công');
        } else{
            die(mysqli_error($connect));
        }
    }else{
        header('location:index.php');
    }
}
 
mysqli_close($connect);




