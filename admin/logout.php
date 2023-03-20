<?php 
session_start();
unset($_SESSION['idAdmin']);
unset($_SESSION['fullname']);
unset($_SESSION['lever']);


header('location:index.php');