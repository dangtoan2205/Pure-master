<?php
require 'admin/root.php';
$brands = isset($_GET['lp']) ? $_GET['lp'] : '';

$sqlPt = "SELECT count(*) FROM product_laptop
JOIN manufactures on product_laptop.manufacturer_id = manufactures.id
WHERE manufactures.name = '$brands'";

$arrayNum = mysqli_query($connect, $sqlPt);
$row = mysqli_fetch_assoc($arrayNum);
$total_records = $row['count(*)'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1; 
}

$start = ($current_page - 1) * $limit;


$sql = "SELECT 
        product_laptop.*,
        manufactures.name  as manufactures_name
        FROM `product_laptop`
        JOIN manufactures on product_laptop.manufacturer_id = manufactures.id
        WHERE manufactures.name = '$brands'
        ORDER BY product_laptop.id DESC
        LIMIT $limit offset $start";
$result = mysqli_query($connect, $sql);
?>

<div class="container">
    <div class="grid_full-width">
        <?php include './partials/menu.php' ?>
        <?php include './partials/breadcrumb.php' ?>
        <div class="grid_full-width content">
            <div class="content__brands">
                <?php include './partials/slider.php' ?>
                <div class="grid">
                    <div class="brands__heading">
                        <h1>Dòng Laptop <?php echo $brands; ?> Series</h1>
                    </div>
                </div>
                <div class="grid">
                    <div class="row row-category">
                            <?php foreach ($result as $each) : ?>
                                <div class="col col-3 col-2-mt mt-10">
                                    <div class="category">
                                        <a href="view_detail.php?lap_id=<?php echo $each['id'] ?>" class="category_link">
                                            <div class="category__img">
                                                <img src="admin/product_laptop/server/uploads/<?php echo $each['photo'] ?>" alt="">
                                            </div>
                                            <h4 class="category__name"><?php echo $each['name'] ?></h4>
                                            <div class="category__price">
                                                <p> Giá bán:</p>
                                                <span class="category__money">
                                                    <?php echo currency_format($each['price']) ?>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="category-btn">
                                            <ul class="category-cart">
                                                <li>
                                                    <a href="view_detail.php?lap_id=<?php echo $each['id'] ?>">
                                                        Mua ngay
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php if (!empty($_SESSION['id'])) { ?>
                                                        <a href="add_to_cart_lp.php?lap_id=<?php echo $each['id'] ?>">
                                                            Thêm vào giỏ hàng
                                                        </a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                    </div>
                    <div class="row">
                        <div class="row_page">
                            <nav>
                                <ul class="pagination">
                                    <?php if ($current_page > 1 && $total_page > 1) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="view_brand.php?lp=<?php echo $brands ?>&page=<?php echo ($current_page - 1) ?>">Prev</a>
                                        </li>
                                    <?php } ?>
                                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                        <li class="page-item">
                                            <?php if ($i == $current_page) { ?>
                                                <span class="page-link text-muted"><?php echo  $i ?></span>
                                            <?php } else { ?>
                                                <a class="page-link" href="view_brand.php?lp=<?php echo $brands ?>&page=<?php echo  $i ?>"><?php echo  $i ?></a>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                    <?php if ($current_page < $total_page && $total_page > 1) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="view_brand.php?lp=<?php echo $brands ?>&page=<?php echo ($current_page + 1) ?>">Next</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
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