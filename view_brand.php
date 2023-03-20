<?php

session_start();
require 'admin/root.php';

$brand = isset($_GET['mb']) ? $_GET['mb'] : '';

$brands = isset($_GET['lp']) ? $_GET['lp'] : '';

$sql = "SELECT * FROM `manufactures` WHERE name = '$brand' or name = '$brands'";
$result = mysqli_query($connect, $sql);
if (!(mysqli_num_rows($result) === 1)) {
    header('location:404.php');
}

if (!empty($_GET['mb'])) {
    $sql = "SELECT `products`.*, manufactures.name 
    FROM products Join manufactures on manufactures.id = products.manufacturer_id 
    Where manufactures.name = '$brand'";
    $result_mb = mysqli_query($connect, $sql);
    $value_mb = mysqli_fetch_array($result_mb);
    if (empty($value_mb)) {
        header('location:404.php');
    }
}
if (!empty($_GET['lp'])) {
    $sql = "SELECT `product_laptop`.*, manufactures.name 
    FROM product_laptop Join manufactures on manufactures.id = product_laptop.manufacturer_id 
    Where manufactures.name = '$brands'";
    $result_lp = mysqli_query($connect, $sql);
    $value_lp = mysqli_fetch_array($result_lp);
    if (empty($value_lp)) {
        header('location:404.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if (!empty($_GET['mb'])) {
                echo $value_mb['name'] . " | Điện thoại";
            }else { 
                echo $value_lp['name'] . " | Laptop xách tay";
            }
        ?>
    </title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/view_all.css" />
    <link rel="stylesheet" href="./public/css/pages.css" />
    <link rel="stylesheet" href="./public/css/breadcrumb.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    
</head>

<body>
    <div class="wrapper">
        <?php include './partials/sticky.php' ?>
        <?php
        if (!empty($_GET['mb'])) {
            include './detail/detail_brand.php';
        }
        ?>
        <?php
        if (!empty($_GET['lp'])) {
            include './detail/detail_brand_lap.php';
        }
        ?>
        <?php include './partials/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./public/js/js.js"></script>
    <script src="./public/js/slider.js"></script>
    <script src="./public/js/live-searchs.js"></script>

</body>

</html>