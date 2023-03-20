<?php
    require '../check_admin_login.php';
    require '../root.php';

    $sql = "SELECT * FROM `manufactures`";
    $result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php
        include '../partials/head_view.php';
    ?>

    <title>Advertise - insert</title>

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
                <p> This is add advertise page !</p>
                <a class="btn btn-primary" href="index.php">List adverts</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form class="border p-3" action="process_insert.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="">Ảnh(*)</label>
                        <input class="form-control" type="file" name="photo">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="manufacturer_id">
                            <?php foreach ($result as $each) : ?>
                                <option value="<?php echo $each['id'] ?>">
                                    <?php echo $each['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="rules">
                                <option value="1">
                                    Active slide
                                </option>
                                <option value="2">
                                    Active sidebar
                                </option>
                                <option value="3">
                                    Active exclusivenes
                                </option>
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