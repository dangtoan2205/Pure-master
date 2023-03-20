<div class="container">
    <div class="grid_full-width">
        <?php include './partials/menu.php' ?>
        <div class="grid_full-width content">
            <div class="content__brands">
                <?php include './partials/slider.php' ?>
                <div class="grid">
                    <?php if(!empty(mysqli_fetch_array($result))){ ?>
                    <div class="row">
                        <div class="col col-full">
                            <div class="grid table_cart-info">
                                <div class="row-table_cart">
                                    <div class="col-table">Mã đơn</div>
                                    <div class="col-table col-table-5">Thông tin sản phẩm</div>
                                    <div class="col-table col-table-2">Số lượng</div>
                                    <div class="col-table col-table-2">Trạng thái đơn hàng</div>
                                </div>
                                <?php foreach ($result as $each) : ?>
                                    <div class="row-table_cart row-table-order-js">
                                        <div class="col-table-p col-table-2">
                                            <span style="margin: 0 auto ;"><?php echo $each['id'] ?></span>
                                        </div>
                                        <div class="col-table-p col-table-5">
                                            <?php if (!empty($each['name_product']) || !empty($each['image_product'])) : ?>
                                                <img height="200" src="admin/products/server/uploads/<?php echo $each['image_product'] ?>" alt="">
                                                <p><?php echo $each['name_product'] ?></p>
                                            <?php endif ?>
                                            <?php if (!empty($each['name_lp_product']) || !empty($each['image_lp_product'])) : ?>
                                                <img height="200" src="admin/product_laptop/server/uploads/<?php echo $each['image_lp_product'] ?>" alt="">
                                                <p><?php echo $each['name_lp_product'] ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-table-p col-table-2">
                                            <span class="order-quantity">
                                                <?php echo $each['quantity'] ?>
                                            </span>
                                        </div>

                                        <div class="col-table-p col-table-2">
                                            <div class="order_info">
                                                <?php
                                                switch ($each['status']) {
                                                    case '0':
                                                        echo "Chờ duyệt";
                                                        break;
                                                    case '1':
                                                        echo "Đã duyệt";
                                                        break;
                                                    case '2':
                                                        echo '<span style="color: red;">Đã hủy</span>';
                                                        break;
                                                }
                                                ?>
                                            </div>
                                            <?php if($each['status'] == 0): ?>
                                                <a onclick="return Cancel()" class="order_cancel" href="./order_cancel.php?id=<?php echo $each['id'] ?>" class="">
                                                    Hủy
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                        <div class="row-table_cart row-after">
                                            <div class="col-table col-table-5">Tổng tiền hóa đơn: $<span id="sum_quantity"><?php echo currency_format($each['total_price']) ?></span> </div>
                                        </div>
                                    
                                    <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <?php } else{ ?>
                    <div class="row">
                        <div class="col col-full">
                            <div class="grid table_cart-info">
                                <div class="row-table_cart">
                                    <div style="margin: 0 auto;" class="content_cart">
                                        <div class="cart_none">
                                            <img src="./public/img/cart_0.png" alt="">
                                            <h3>Bạn không có đơn hàng nào !!</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
            <?php include './partials/slidebar.php' ?>
        </div>

        <div class="footer">
            <div class="grid_full-width">
                <div class="grid">
                    <div class="row">
                        <div class="col col-4 col-mobi">
                            <div class="logo logo-bottom ml-mobi">
                                <img src="./public/img/logo2.png" alt="" class="img">
                            </div>
                            <div class="footer__text ml-mobi">
                                <p>Vietpro Academy thành lập năm 2009. Chúng
                                    tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập
                                    trình Website & Mobile nhằm cung cấp cho thị
                                    trường CNTT Việt Nam những lập trình viên
                                    thực sự chất lượng, có khả năng làm việc độc
                                    lập, cũng như Team Work ở mọi môi trường đòi
                                    hỏi sự chuyên nghiệp cao. </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>Địa chỉ</h3>
                            </div>
                            <div class="footer__text">
                                <p>
                                    B8A Võ Văn Dũng - Hoàng Cầu Đống Đa -
                                    Hà Nội
                                </p>
                                <p>
                                    Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà
                                    Nội
                                </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>Dịch vụ</h3>
                            </div>
                            <div class="footer__text">
                                <p>
                                    Bảo hành rơi vỡ, ngấm nước Care Diamond
                                </p>
                                <p>
                                    Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi
                                    mới
                                </p>
                            </div>
                        </div>
                        <div class="col col-4 col-mobi">
                            <div class="footer__about">
                                <h3>Liên hệ</h3>
                            </div>
                            <div class="footer__text">
                                <p>Phone Sale: <a href="tel:+00 151515">(+84) 0988 550 5535</a></p>
                                <p>Email: <a href="mailto:vietpro.edu.vn@gmail.com">vietpro.edu.vn@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>