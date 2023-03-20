<?php
require '../check_admin_login.php';
require '../root.php';

$sql = "SELECT * FROM admins ORDER BY `admins`.`status` DESC , `admins`.`lever` DESC";
$result = mysqli_query($connect, $sql);
if (empty($result)) {
    header('location:../partials/404.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>
    <title>Admin - Users</title>

    <!-- Custom styles for this page -->
    <link href="../public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <?php
        require '../menu.php';
        ?>
        <h5 class="text-left mt-3">Quản lý quảng bá sản phẩm</h5>
        <div class="row p-2">
            <?php if (!empty($_SESSION['lever'])) : ?>
                <a class="btn btn-primary ml-2" href="form_insert.php"> Thêm </a>
            <?php endif ?>
            <a class="btn btn-primary ml-2" href="index.php"> View all </a>
            <!-- <form class="input-group ml-auto" style="width: 50%;">
                <input class="form-control" type="search" placeholder="Tìm kiếm tên nhà sản xuất..." name="search" value="<?php echo $search ?>">
            </form> -->
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Quyền hạn</th>
                                    <th>Status</th>
                                    <?php if ($_SESSION['lever'] == 1) : ?>
                                        <th>Sửa</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody class="thead-light">
                                <?php foreach ($result as $each) : ?>
                                    <tr class="text-dark">
                                        <td class="text-primary"> <?php echo $each['id']; ?></td>
                                        <td class="text-primary"> <?php echo $each['fullname']; ?></td>
                                        <td class="text-primary"> <?php echo $each['email']; ?></td>
                                        <td class="text-primary"> <?php echo $each['phone']; ?></td>
                                        <td class="text-primary">
                                            <?php
                                            switch ($each['lever']) {
                                                case '0':
                                                    echo "Nhân viên";
                                                    break;
                                                case '1':
                                                    echo "Boss shop";
                                                    break;
                                                case '2':
                                                    echo "Tạp vụ siêu cấp VipPro";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td class="text-success">
                                            <?php if ($each['status'] == 1) { ?>
                                                Active
                                            <?php } else { ?>
                                                <span class="text-danger">
                                                    Not Active
                                                </span>
    
                                            <?php } ?>
                                        </td>
                                        <?php if ($_SESSION['lever'] == 1) : ?>
                                            <td>
                                                <a class="btn btn-info" href="form_update.php?id=<?php echo $each['id']; ?>">Sửa</a>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../partials/footer_view.php';

    include '../partials/js_link.php';
    ?>
    <!-- Page level plugins -->
    <script src="../public/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../public/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../public/js/demo/datatables-demo.js"></script>
</body>

</html>