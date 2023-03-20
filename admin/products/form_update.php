<?php 
    require '../root.php';
    require '../check_admin_login.php'; 
    if(empty($_GET['id'])){
        header('location:index.php?error= Phải truyền mã để sửa');
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `products`
    WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    if(empty($each)) {
        header('location:../partials/404.php');
    }

    $sql = "SELECT * FROM `manufactures`";
    $manufactures = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include '../partials/head_view.php';
    ?>

    <title>Product - update</title>

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
                <form action="process_update.php" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $each['id']; ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Tên</label>
                            <input class="form-control" type="text" name="name" value="<?php echo $each['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Đổi ảnh mới</label>
                            <input class="form-control" type="file" name="photo_new">
                        </div>
                        <label for="" class="form-label">Hoặc để ảnh cũ</label>
                        <div class="mb-3">
                            <img height="150" src="server/uploads/<?php echo $each['photo'] ?>">
                            <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Giá sản phẩm</label>
                            <input class="form-control" type="text" name="price" value="<?php echo $each['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mô tả sản phẩm</label>
                            <textarea name="descriptions" class="form-control"><?php echo $each['descriptions'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thông số sản phẩm</label>
                            <textarea name="slug" class="form-control"><?php echo $each['slug'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nhà sản xuất</label>
                            <select class="form-control" name="manufacturer_id">
                                <?php foreach($manufactures as $manufacturer): ?>
                                    <option 
                                    value="<?php echo $manufacturer['id'] ?>"
                                    <?php if($each['manufacturer_id'] == $manufacturer['id']) { ?>
                                        selected
                                    <?php } ?>
                                    >
                                        <?php echo $manufacturer['name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
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