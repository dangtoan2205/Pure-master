<?php
require '../check_admin_login.php';

require '../root.php';
$order_id = $_GET['id'];
$sum = 0;
if (empty($_GET['id'])) {
    header('location:index.php');
    exit;
}

$sql = "SELECT * 
    FROM order_detail
    JOIN products on products.id = order_detail.product_id
    WHERE order_id = '$order_id'";
$result = mysqli_query($connect, $sql);

$sql =  "SELECT * 
    FROM order_detail
    JOIN product_laptop on product_laptop.id = order_detail.product_lp_id
    WHERE order_id = '$order_id'";
$result_lp = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>
    <title>Order detail</title>

</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <?php
        require '../menu.php';
        ?>
        <h5 class="text-left mt-3">Xem chi tiết đơn hàng</h5>
        <div class="row p-2">
            <a class="btn btn-primary ml-2" href="index.php"> List orders</a>
        </div>
        <div class="row mt-3">
            <div class="col">
                <?php if (!empty(mysqli_fetch_array($result))) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-1 " id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody class="thead-light">
                                <?php foreach ($result as $each) : ?>
                                    <tr class="text-dark">
                                        <td>
                                            <img height="100" src="../products/server/uploads/<?php echo $each['photo'] ?>" alt="">
                                        </td>
                                        <td><?php echo $each['name'] ?></td>
                                        <td class="text-primary"><?php echo $each['quantity'] ?></td>
                                        <td class="text-danger"><?php echo currency_format($each['price']) ?></td>
                                        <td class="text-danger">
                                            <?php
                                            $result_quantity = $each['price'] * $each['quantity'];
                                            echo currency_format($result_quantity);
                                            $sum += $result_quantity;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <h6 class=" p-2 text-dark float-right">
                            Tổng tiền hóa đơn là: $<span class="ml-1 text-danger"><?php echo currency_format($sum); ?></span>
                        </h6>
                    </div>
                <?php } else { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-1 " id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody class="thead-light">
                                <?php foreach ($result_lp as $each) : ?>
                                    <tr class="text-dark">
                                        <td>
                                            <img height="100" src="../product_laptop/server/uploads/<?php echo $each['photo'] ?>" alt="">
                                        </td>
                                        <td><?php echo $each['name'] ?></td>
                                        <td class="text-primary"><?php echo $each['quantity'] ?></td>
                                        <td class="text-danger"><?php echo currency_format($each['price']) ?></td>
                                        <td class="text-danger">
                                            <?php
                                            $result_quantity = $each['price'] * $each['quantity'];
                                            echo currency_format($result_quantity);
                                            $sum += $result_quantity;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <h6 class=" p-2 text-dark float-right">
                            Tổng tiền hóa đơn là: $<span class="ml-1 text-danger"><?php echo currency_format($sum); ?></span>
                        </h6>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    include '../partials/footer_view.php';

    include '../partials/js_link.php';
    ?>
</body>

</html>