<?php
    require '../check_admin_login.php';
    require '../root.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM `advertise`
        WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    if(empty($each)) {
        header('location:../partials/404.php');
    }

    $sql = "SELECT * FROM `manufactures`";
    $result_m = mysqli_query($connect, $sql);

    if (empty($_GET['id'])) {
        header('location:index.php?error= Phải truyền mã để sửa');
    }
    $result = mysqli_query($connect, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>

    <title>Advertise - update</title>

</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>

    <div class="container-fluid">
        <?php 
            require '../root.php';
        ?>
        <div class="row">
            <div class="col">
                <p> This is add advertise page !</p>
                <a class="btn btn-primary" href="index.php">List adverts</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="process_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $each['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label" for="">Đổi ảnh mới</label>
                        <input class="form-control" type="file" name="photo_new">
                    </div>
                    <label class="form-label" for="">Hoặc để ảnh cũ</label>
                    <div class="mb-3">
                        <img height="150" src="server/uploads/<?php echo $each['photo'] ?>">
                        <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="rules">
                                <option value="0" 
                                <?php if($each['rules'] == 0) { ?>
                                        selected
                                <?php } ?>
                                >
                                    Not active
                                </option>
                                <option value="1"
                                <?php if($each['rules'] == 1) { ?>
                                        selected
                                <?php } ?>
                                >
                                    Active slide
                                </option>
                                <option value="2"
                                <?php if($each['rules'] == 2) { ?>
                                        selected
                                <?php } ?>
                                >
                                    Active sidebar
                                </option>
                                <option value="3"
                                <?php if($each['rules'] == 3) { ?>
                                        selected
                                <?php } ?>
                                >
                                    Active exclusivenes
                                </option>
                        </select>
                    </div>
                    <select class="form-control" name="manufacturer_id">
                        <?php foreach ($result_m as $manufacturer) : ?>
                            <option value="<?php echo $manufacturer['id'] ?>" <?php if ($each['manufacturer_id'] == $manufacturer['id']) { ?> selected <?php } ?>>
                                <?php echo $manufacturer['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <br>
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