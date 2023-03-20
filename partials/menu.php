<?php

$sql = "SELECT * FROM `manufactures` WHERE rules <= 1";
$result_m = mysqli_query($connect, $sql);

$sql = "SELECT * FROM `manufactures` WHERE rules = 2";
$result_ml = mysqli_query($connect, $sql);

?>
<nav class="menu">
    <ul class="menu-list">
        <?php foreach ($result_m as $each_m) : ?>
            <li class="menu-item">
                <a href="view_brand.php?mb=<?php echo $each_m['name'] ?>"><?php echo $each_m['name'] ?></a>
            </li>
        <?php endforeach ?>

        <?php foreach ($result_ml as $each_ml) : ?>
            <li class="menu-item">
                <a href="view_brand.php?lp=<?php echo $each_ml['name'] ?>"><?php echo $each_ml['name'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>