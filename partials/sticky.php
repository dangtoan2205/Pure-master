<!-- dau -->
<div class="header header-fixed">
    <div class="header-container">
        <header class="header-top">
            <div class="logo">
                <a href="index.php">
                    <img src="./public/img/logo.png" alt="" class="img">
                </a>
            </div>
            <div class="header__search">
                <form style="background-color: #fff; border-radius: 3px;" action="search.php" method="post">
                    <input id="project" placeholder="Bạn tìm kiếm gì?" type="text" class="header__input" name="search">
                    <button type="submit" class="header__btn">Tìm Kiếm</button>
                </form>
            </div>
            <div class="header__user">
                <img src="./public/img/user.jpg" alt="">
                <ul class="user__info">
                    <li>
                        <?php if (empty($_SESSION['id'])) { ?>
                            <!-- <button id="btn-signup">Đăng Ký</button> / <button>Đăng Nhập</button> -->
                            <a href="./signup.php">Đăng Ký</a> / <a href="login.php">Đăng Nhập</a>
                        <?php } else { ?>
                            <a style="color: #333;" href="#">Hi! bạn <?php echo $_SESSION['name'] ?>,</a>
                            <a href="./logout.php"> Đăng Xuất</a>
                        <?php } ?>
                    </li>
                    <!-- <li>
                        <div class="user__language">
                            <img src="./public/img/en.svg" alt="">
                            <p>VNG</p>
                            <span><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </li> -->
                    <?php if (!empty($_SESSION['id'])) { ?>
                        <li>
                            <a href="./info_order.php">Thông tin đơn hàng</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <a href="view_cart.php" class="header__cart">
                <?php
                $sum = 0;
                $sums = 0;
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $id => $each) {
                        $sum += $each['quantity'];
                    }
                }
                if (!empty($_SESSION['carts'])) {
                    $carts = $_SESSION['carts'];
                    foreach ($carts as $id => $each) {
                        $sums += $each['quantity'];
                    }
                }
                $total = $sum + $sums;
                ?>
                <h4>Giỏ Hàng</h4>
                <span class="header__cart-notice"><?php echo $total ?></span>
            </a>
            <label for="header__mobile-input" class="bars__header-mobile">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
                </svg>
            </label>
            <input hidden type="checkbox" name="" class="header__input" id="header__mobile-input">
            <label for="header__mobile-input" class="header__overlay"></label>
            <nav class="navbar__mobile">
                <label for="header__mobile-input" class="bars__header-close">
                    <svg fill="#333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                    </svg>
                </label>
                <form class="header__search-mobile" action="search.php" method="post">
                    <input id="project" placeholder="Nhập tìm kiếm" class="search-mobile__input" name="search">
                    <button type="submit" class="search-mobile__btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <ul class="mobile-list">
                    <li class="mobile-item">
                        <a href="view_cart.php" class="mobile-item__link">Giỏ hàng</a>
                    </li>
                    <li class="mobile-item">
                        <a href="info_order.php" class="mobile-item__link">Thông tin đơn hàng</a>
                    </li>
                    <?php if (empty($_SESSION['id'])) { ?>
                        <li class="mobile-item">
                            <a href="signup.php" class="mobile-item__link">Đăng Ký</a>
                        </li>
                        <li class="mobile-item">
                            <a href="login.php" class="mobile-item__link">Đăng Nhập</a>
                        </li>
                    <?php } else { ?>
                        <li class="mobile-item">
                            <a href="logout.php" class="mobile-item__link">Đăng Xuất</a>
                        </li>
                    <?php } ?>
                    <!-- <li class="mobile-item">
                        <div class="mobile-item__language">
                            <img src="./public/img/vi.svg" alt="">
                            <p class="mobile-item__language--name">VNG</p>
                            <span class="mobile-item__language--icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                            <div class="mobile__language">
                                <ul class="mobile__language--list">
                                    <li class="change__language--item">
                                        <div class="change__language-vi">
                                            <img src="./public/img/vi.svg" alt="">
                                            <p class="change__language-name">Tiếng Việt</p>
                                            <span class="change__language-icon">
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="change__language--item">
                                        <div class="change__language-vi">
                                            <img src="./public/img/en.svg" alt="">
                                            <p class="change__language-name">English</p>
                                        </div>
                                    </li>
                                    <li class="change__language--item">

                                        <div class="change__language-vi">
                                            <img src="./public/img/ko.svg" alt="">
                                            <p class="change__language-name">Korean</p>
                                        </div>
                                    </li>
                                    <li class="change__language--item">
                                        <div class="change__language-vi">
                                            <strong>VNG</strong>
                                            <p class="change__language-name">Việt Nam Đồng</p>
                                            <span class="change__language-icon">
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="change__language--item">
                                        <div class="change__language-vi">
                                            <strong>USD</strong>
                                            <p class="change__language-name">United States Dollar</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </nav>
        </header>
    </div>
</div>