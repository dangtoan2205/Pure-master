<?php 
    require '../check_admin_login.php'; 

    require '../root.php';

    $detail_id = $_GET['id'];
    if(empty($_GET['id'])){
        header('location:index.php');
        exit;
    }

    $sql =  "SELECT 
    product_laptop.*,
    config_laptop.name_detail as cfig_name,
    config_product_laptop.values as value
    FROM config_product_laptop
    left JOIN config_laptop on config_laptop.id = config_product_laptop.config_laptop_id
    left JOIN product_laptop on product_laptop.id = config_product_laptop.pro_laptop_id
    WHERE pro_laptop_id = '$detail_id'";
    $result = mysqli_query($connect, $sql);
    $values = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include '../partials/head_view.php';
    ?>
    <title>Product_laptop detail</title>

</head>

<body id="page-top">
    <?php
        include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <?php
            require '../menu.php';
        ?>
        <?php if(isset($_SESSION['error'])) { ?>
            <h5 class="text-center text-danger">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </h5>
        <?php } ?>
        <h5 class="text-left mt-3">Xem chi tiết đơn hàng</h5>
        <div class="row p-2">
            <a class="btn btn-primary ml-2" href="index.php"> List Product_laptop</a>
        </div>
        <div class="row mt-3">
            <?php if(!empty($values)){ ?>
                <div class="col">
                    <div class="table-responsive">
                    <table class="table table-bordered mt-1 " id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Thông số kỹ thuật</th>
                                </tr>
                            </thead>
                            <tbody  class="thead-light">
                                <tr class="text-dark">
                                    <td><?php echo $values['name'] ?></td>
                                    <td>
                                        <img height="100" src="../product_laptop/server/uploads/<?php echo $values['photo'] ?>" alt="">
                                    </td>
                                    <td>
                                        <div>
                                            <?php foreach ($result as $each): ?>
                                                <p><?php echo $each['cfig_name'] ?> : <span><?php echo $each['value'] ?></span></p>
                                            <?php endforeach ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php }else{?>
                <div class="alert alert-primary " role="alert">
                    <a href="add_config_laptop.php?id=<?php echo $detail_id?>">Bấm vào đây để nhập thông số sản phẩm</a>
                </div>
            <?php }?>
        </div>
    </div>
    <?php
        include '../partials/footer_view.php';

        include '../partials/js_link.php';
    ?>
</body>

</html>