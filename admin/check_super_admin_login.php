<?php
session_start();
if(empty($_SESSION['lever'] == 1)){
    header('location:../index.php');
}