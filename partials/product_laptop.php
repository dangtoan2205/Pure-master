<?php
require 'admin/root.php';

$sqlPt = "SELECT count(id) as total FROM product_laptop";

$arrayNum = mysqli_query($connect, $sqlPt);
$row = mysqli_fetch_assoc($arrayNum);
$total_records = $row['total'];

$current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
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
        ORDER BY product_laptop.id DESC
        LIMIT $limit offset $start";
$result = mysqli_query($connect, $sql);

?>

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
                                <?php echo     currency_format($each['price']) ?>
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
                                    <a onclick="return Suc()" href="add_to_cart_lp.php?lap_id=<?php echo $each['id'] ?>">
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
                            <a class="page-link" href="index.php?pages=<?php echo ($current_page - 1) ?>">Prev</a>
                        </li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                        <li class="page-item">
                            <?php if ($i == $current_page) { ?>
                                <span class="page-link text-muted"><?php echo  $i ?></span>
                            <?php } else { ?>
                                <a class="page-link" href="index.php?pages=<?php echo  $i ?>"><?php echo  $i ?></a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    <?php if ($current_page < $total_page && $total_page > 1) { ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?pages=<?php echo ($current_page + 1) ?>">Next</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>