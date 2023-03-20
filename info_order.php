<?php

session_start();

require 'admin/root.php';
$id_order = $_SESSION['id'];

$sql = "SELECT order_detail.quantity as quantity, 
orders.status as status, 
orders.id as id, 
orders.total_price as total_price, 
products.id as product_id,
products.name as name_product, 
products.photo as image_product,
product_laptop.id as product_lp_id,
product_laptop.name as name_lp_product, 
product_laptop.photo as image_lp_product
FROM order_detail  
LEFT JOIN orders on orders.id = order_detail.order_id 
LEFT JOIN products on products.id = order_detail.product_id 
LEFT JOIN product_laptop on product_laptop.id = order_detail.product_lp_id 
WHERE orders.customer_id = '$id_order' ORDER BY `orders`.`id` DESC";
$result = mysqli_query($connect, $sql);

if(empty($id_order)) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/view_all.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="wrapper">
        <?php include './partials/sticky.php' ?>
        <?php include './detail/detail_order.php' ?>
        <?php include './partials/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./public/js/js.js"></script>
    <script src="./public/js/slider.js"></script>
    <script src="./public/js/live-search.js"></script>
    <script>
        function Cancel(){
            return confirm("Bạn có chắc hủy đơn sản phẩm ??");
        }
    </script>
</body>

</html>