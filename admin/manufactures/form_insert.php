<?php
require '../check_super_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>

    <title>Manufacture - insert</title>

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
                <form action="process_insert.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Tên(*)</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nhà phân phối(*)</label>
                        <select class="form-control" name="rules">
                            <?php for ($i = 0; $i <= 3; $i++) : ?>
                                <option value="<?php echo $i ?>">
                                    <?php if ($i == 0) : ?>
                                        <td>Nhà máy ngừng hoạt động</td>
                                    <?php elseif ($i == 1) : ?>
                                        <td>Điện thoại</td>
                                    <?php elseif ($i == 2) : ?>
                                        <td>Máy tính xách tay</td>
                                    <?php elseif ($i == 3) : ?>
                                        <td>Điện thoại, Máy tính xách tay</td>
                                    <?php endif ?>
                                </option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ(*)</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại(*)</label>
                        <input class="form-control" type="text" name="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh(*)</label>
                        <input class="form-control" type="text" name="photo">
                    </div>
                    <button class="btn btn-primary float-end" type="submit">Thêm</button>
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