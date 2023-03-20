<?php 
    require '../root.php';
    require '../check_admin_login.php'; 


    $sql = "SELECT * FROM `manufactures`";
    $result = mysqli_query($connect, $sql);
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
                <form action="process_insert.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Tên(*)</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh(*)</label>
                        <input class="form-control" type="file" name="photo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá sản phẩm(*)</label>
                        <input class="form-control" type="text" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả sản phẩm(*)</label>
                        <textarea name="descriptions" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thông số sản phẩm(*)</label>
                        <textarea name="slug" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhà sản xuất</label>
                        <select class="form-control" name="manufacturer_id">
                            <?php foreach($result as $each):?>
                                <option value="<?php echo $each['id']?>">
                                    <?php echo $each['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
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