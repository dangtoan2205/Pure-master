<?php 
    require '../check_super_admin_login.php'; 
    
    if(empty($_GET['id'])){
        header('location:index.php?error= Phải truyền mã để sửa');
    }

    $id = $_GET['id'];
    require '../root.php';

    $sql = "SELECT * FROM `manufactures`
    WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    if(empty($each)) {
        header('location:../partials/404.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include '../partials/head_view.php';
    ?>

    <title>Manufacture - update</title>

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
                <p> This is add manufacture page !</p>
                <a class="btn btn-primary" href="index.php">List manufacture</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="process_update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                        <div class="mb-3">
                            <label class="form-label">Tên(*)</label>
                            <input class="form-control" type="text" name="name" value="<?php echo $each['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nhà phân phối(*)</label>
                            <select class="form-control" name="rules">
                                <?php for ($i = 0; $i <= 3; $i++) : ?>
                                    <option value="<?php echo $i ?>" <?php if ($i == $each['rules']) { ?> selected <?php } ?>>
                                        <?php if( $i == 0): ?>
                                            <td>Nhà máy ngừng hoạt động</td>
                                        <?php elseif( $i == 1): ?>
                                            <td>Điện thoại</td>
                                        <?php elseif( $i == 2): ?>
                                            <td>Máy tính xách tay</td>
                                        <?php elseif( $i == 3): ?>
                                            <td>Điện thoại, Máy tính xách tay</td>
                                        <?php endif ?>
                                    </option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ(*)</label>
                            <textarea class="form-control" name="address" rows="3"><?php echo $each['address']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại(*)</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $each['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh(*)</label>
                            <input class="form-control" type="text" name="photo" value="<?php echo $each['photo']; ?>">
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