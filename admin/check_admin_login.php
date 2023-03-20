<?php

session_start();
if(!isset($_SESSION['lever'])){
    header('location:../index.php');
}

