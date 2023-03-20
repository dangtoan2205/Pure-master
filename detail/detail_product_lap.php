<?php

require 'admin/root.php';
$id = isset($_GET['lap_id']) ? $_GET['lap_id'] : '';

$sql =  "SELECT 
product_laptop.*,
config_laptop.name_detail as cfig_name,
config_product_laptop.values as value
FROM config_product_laptop
left JOIN config_laptop on config_laptop.id = config_product_laptop.config_laptop_id
left JOIN product_laptop on product_laptop.id = config_product_laptop.pro_laptop_id
WHERE pro_laptop_id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

$sql = "SELECT manufactures.name as brands, product_laptop.* FROM product_laptop
JOIN manufactures on manufactures.id = product_laptop.manufacturer_id
WHERE product_laptop.id = '$id'";
$result_b = mysqli_query($connect, $sql);
$brands = mysqli_fetch_array($result_b )['brands'];
?>
<div class="container">
    <div class="grid_full-width">
        <?php include './partials/menu.php' ?>
        <?php include './partials/breadcrumb.php' ?>
        <div class="grid_full-width content">
            <div class="content__brands">
                <?php include './partials/slider.php' ?>
                <div class="grid grid-cart_phone">
                    <div class="row">
                        <div class="col col-2">
                            <div class="cart_phone-img">
                                <img src="admin/product_laptop/server/uploads/<?php echo $each['photo'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col col-2">
                            <div class="cart_phone-about">
                                <h2><?php echo $each['name'] ?></h2>
                                <span>
                                    <?php foreach($result as $value): ?>
                                        <p style="padding: 5px 10px;font-size: 1.4rem;font-weight: 500;">
                                            <?php echo $value['cfig_name']?>:
                                        <span><?php echo $value['value']?></span>
                                        </p>
                                    <?php endforeach ?>
                                </span>
                                <h4>Giá: <span><?php echo currency_format($each['price']) ?></span></h4>
                                <?php if(empty($_SESSION['id'])){ ?>
                                    <a onclick="return Onc()" href="login.php" class="cart_phone-btn">Mua ngay</a>
                                <?php } else { ?>
                                    <a class="cart_phone-btn" href="add_to_cart_lp.php?lap_id=<?php echo $each['id'] ?>">Mua ngay</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cart_phone">
                    <div class="row">
                        <div class="cart_phone-about">
                            <h3>Thông tin sản phẩm:</h3>
                            <p class="cart_phone-descriptions"><?php echo $each['descriptions'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './partials/slidebar.php' ?>
        </div>
        <?php include './detail/comments.php' ?>
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
</div>