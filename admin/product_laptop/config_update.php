<?php 
    require '../root.php';
    require '../check_admin_login.php'; 
    $detail_id = $_GET['id'];
    if(empty($_GET['id'])){
        header('location:index.php');
        exit;
    }

    $sql = "SELECT * FROM `product_laptop` WHERE id = $detail_id";
    $result_m = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result_m);


    $sql =  "SELECT 
    product_laptop.*,
    config_laptop.name_detail as cfig_name,
    config_product_laptop.values as value,
    config_laptop.name as name_config
    FROM config_product_laptop
    left JOIN config_laptop on config_laptop.id = config_product_laptop.config_laptop_id
    left JOIN product_laptop on product_laptop.id = config_product_laptop.pro_laptop_id
    WHERE pro_laptop_id = '$detail_id'";
    $result = mysqli_query($connect, $sql);
    $value= mysqli_fetch_array($result);
    if(empty($value)){
        $_SESSION['error'] = "Vui lòng nhập thông số cho sản phẩm";
        header("location: detail_config.php?id=.$detail_id");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include '../partials/head_view.php';
    ?>

    <title>Product - insert</title>

</head>

<body id="page-top">
    <?php
        include '../partials/header_view.php';
    ?>

    <div class="container-fluid">
        <?php 
            require '../menu.php';
        ?>
        <div class="row">
            <div class="col">
                <p> This is add product page !</p>
                <a class="btn btn-primary" href="index.php">List product</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="process_config.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input class="mt-2 form-control" type="text" name="name_id" value=" <?php echo $each['name'] ?>">
                           
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thông số ký thuật(*)</label>
                        <?php if(!empty(mysqli_query($connect, $sql))){ ?>
                            <div class="border p-3">
                                <?php foreach ($result as $each): ?>
                                    <p class="text-capitalize"><?php echo $each['name_config'] ?> : 
                                        <input class="mt-2 form-control" type="text" name="<?php echo $each['name_config'] ?>" value="<?php echo $each['value'] ?>">
                                    </p>
                                <?php endforeach ?>
                            </div>
                            <?php } ?>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        include '../partials/footer_view.php';

        include '../partials/js_link.php';
    ?>

</body>

</html>