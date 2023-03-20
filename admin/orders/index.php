<?php
    require '../check_admin_login.php'; 
    require '../root.php';

    $search = trim($_GET['search'] ?? null);

    $sqlPt = "SELECT count(id) as total FROM orders
    WHERE
    orders.created_at LIKE '%$search%'";

    $arrayNum = mysqli_query($connect, $sqlPt);
    $row = mysqli_fetch_assoc($arrayNum);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 3;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $sql =  "SELECT
        orders.*, 
        customers.name,
        customers.phone,
        customers.address
        FROM orders
        JOIN customers on customers.id = orders.customer_id
        WHERE
        orders.created_at LIKE '%$search%'
        ORDER BY  `orders`.`status` ASC,`orders`.`id` DESC
        LIMIT $limit offset $start";
    $result = mysqli_query($connect, $sql);
    if(empty($result)) {
        header('location:../partials/404.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include '../partials/head_view.php';
    ?>
    <title>Admin orders</title>
</head>

<body id="page-top">
    <?php
        include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <?php
            require '../menu.php';
        ?>
        <h5 class="text-left mt-3">Khu vực kiểm tra đơn  hàng</h5>
        <div class="row p-2">
            <!-- <a class="btn btn-primary ml-2" href="form_insert.php"> Thêm </a> -->
            <a class="btn btn-primary ml-2" href="index.php"> View all </a>
            <form class="input-group ml-auto" style="width: 50%;">
                <input class="form-control" type="search" placeholder="Tìm kiếm thời gian đặt..." name="search" value="<?php echo $search ?>">
            </form>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered mt-1 " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Thời gian đặt</th>
                                <th>Thông tin người nhận</th>
                                <th>Thông tin người đặt</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Xem</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody  class="thead-light">
                            <?php foreach ($result as $each): ?>
                            <tr class="text-dark text-center">
                                <td class="text-primary"><?php echo $each['id'] ?></td>
                                <td class="text-primary"><?php echo $each['created_at'] ?></td>
                                <td>
                                    <p>
                                        <span class="text-primary">Tên người nhận:</span>
                                        <?php echo $each['name_receiver'] ?>
                                    </p>
                                    <p>
                                        <span class="text-primary">SĐT người nhận:</span>
                                        <?php echo $each['phone_receiver'] ?>
                                    </p>
                                    <p>
                                        <span class="text-primary">Địa chỉ người nhận:</span>
                                        <?php echo $each['address_receiver'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <span class="text-primary">Tên người đặt:</span>
                                        <?php echo $each['name'] ?>
                                    </p>
                                    <p>
                                        <span class="text-primary">Tên người đặt:</span>
                                        <?php echo $each['phone'] ?>
                                    </p>
                                    <p>
                                        <span class="text-primary">Tên người đặt:</span>
                                        <?php echo $each['address'] ?>
                                    </p>
                                </td>
                                <td>
                                    <?php 
                                        switch ($each['status']){
                                            case '0':
                                                echo "Mới đặt";
                                                break;
                                            case '1':
                                                echo "Đã duyệt";
                                                break; 
                                            case '2':
                                                echo 'Đã hủy';
                                                break;    
                                        }
                                    ?>
                                 </td>
                                <td class="text-danger"><?php echo currency_format($each['total_price']) ?></td>
                                <td>
                                    <a  class="btn m-1 btn-primary" href="detail.php?id=<?php echo $each['id'] ?>">Xem</a>
                                </td>
                                <td >
                                    <?php if($each['status'] == 0){ ?>
                                        <a class="btn m-1 btn-info" href="update.php?id=<?php echo $each['id'] ?>&status=1">Duyệt</a>
                                        <br>
                                        <a class="btn m-1 btn-danger" href="update.php?id=<?php echo $each['id'] ?>&status=2">Hủy</a>

                                    <?php }elseif($each['status'] == 1) { ?>
                                        <a class="btn m-1 btn-danger" href="update.php?id=<?php echo $each['id'] ?>&status=2">Hủy</a>
                                    <?php } else {?>
                                        <a class="btn m-1 btn-info" href="update.php?id=<?php echo $each['id'] ?>&status=1">Duyệt</a>
                                    <?php } ?>
                                </td>

                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php
                        include '../partials/pagination.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../partials/footer_view.php';

        include '../partials/js_link.php';
    ?>
</body>

</html>