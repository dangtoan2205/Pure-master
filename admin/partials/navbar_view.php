<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!-- <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form> -->
    <?php

        require '../root.php';

        $sql_cn = "SELECT count(*) 
                FROM orders
                WHERE status = 0";
        $result_cn = mysqli_query($connect, $sql_cn);
        $each_cn = mysqli_fetch_array($result_cn);
        $num_cn = $each_cn['count(*)'];


        $sql_tb = "SELECT orders.*,
        products.name as mbi_name,
        products.photo as mbi_photo,
        order_detail.quantity,
        product_laptop.name as lap_name,
        product_laptop.photo as lap_photo
        FROM order_detail
        LEFT JOIN orders ON orders.id = order_detail.order_id
        LEFT JOIN products ON products.id = order_detail.product_id             
        LEFT JOIN product_laptop ON product_laptop.id = order_detail.product_lp_id  
        ORDER BY `orders`.`status` ASC , orders.id DESC
        LIMIT 4;";
        $result_tb = mysqli_query($connect, $sql_tb);
    ?>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php if (!empty($num_cn)) { ?>
                    <span class="badge badge-danger badge-counter"><?php echo $num_cn ?> +</span>
                <?php } else { ?>
                    <span class="badge badge-danger badge-counter"></span>
                <?php } ?>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>


                <?php foreach ($result_tb as $each_tb) : ?>
                    <a class="dropdown-item d-flex align-items-center" href="../orders/detail.php?id=<?php echo $each_tb['id'] ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <!-- <i class="fas fa-file-alt text-white"></i> -->
                                <?php if(!empty($each_tb['mbi_photo'])){ ?>
                                    <img height="50" src="../products/server/uploads/<?php echo $each_tb['mbi_photo'] ?>" alt="">
                                <?php }else{ ?>
                                    <img height="50" src="../product_laptop/server/uploads/<?php echo $each_tb['lap_photo'] ?>" alt="">
                                <?php } ?>
                            </div>
                        </div>
                        <div>
                            <div class="small text-dark">
                                Số lượng đặt: <?php echo $each_tb['quantity'] ?>
                                <span class="text-primary">
                                    <?php echo $each_tb['created_at'] ?>
                                </span>
                                <?php if (!empty($each_tb['status'])) { ?>
                                    <span class="badge badge-danger badge-counter"></span>
                                <?php } else { ?>
                                    <span class="badge badge-danger badge-counter">new</span>
                                <?php } ?>
                            </div>
                            <?php if(!empty($each_tb['mbi_name'])){ ?>
                                <span class="font-weight-bold"><?php echo $each_tb['mbi_name'] ?></span>
                            <?php }else{ ?>
                                <span class="font-weight-bold"><?php echo $each_tb['lap_name'] ?></span>
                            <?php } ?>
                        </div>
                    </a>
                <?php endforeach ?>

                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a> -->
                <a class="dropdown-item text-center small text-gray-500" href="../orders/index.php">Show All Alerts</a>
            </div>
        </li>
                                
        <!-- Nav Item - Messages -->
        <!-- <li class="nav-item dropdown no-arrow mx-1"> -->
            <!-- 
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                    <--! Counter - Messages ->
                    <span class="badge badge-danger badge-counter">7</span>
            </a>
            --> 
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="../public/img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="../public/img/undraw_profile_2.svg" alt="...">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="../public/img/undraw_profile_3.svg" alt="...">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div> -->
        <!-- </li> -->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname'] ?></span>
                <img class="img-profile rounded-circle" src="../public/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>