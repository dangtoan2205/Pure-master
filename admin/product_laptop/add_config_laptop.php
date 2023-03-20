<?php 
    require '../root.php';
    require '../check_admin_login.php'; 

    $sql = "SELECT * FROM `product_laptop` WHERE id=(SELECT MAX(id) FROM `product_laptop`)";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

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
                <form action="config_laptop.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input class="mt-2 form-control" type="text" name="name_id" value=" <?php echo $each['name'] ?>">
                           
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thông số ký thuật(*)</label>
                        <div class="border p-3">
                                <p class="text-capitalize">ram: <span>
                                    <input class="mt-2 form-control" type="text" name="ram">
                                </span></p>
                                <p class="text-capitalize">ssd: <span>
                                    <input class="mt-2 form-control" type="text" name="ssd">
                                </span></p>
                                <p class="text-capitalize">cpu: <span>
                                    <input class="mt-2 form-control" type="text" name="cpu">
                                </span></p>
                                <p class="text-capitalize">screen: <span>
                                    <input class="mt-2 form-control" type="text" name="screen">
                                </span></p>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Thêm</button>
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