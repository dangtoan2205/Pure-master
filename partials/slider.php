<?php
$sql = "SELECT advertise.*, manufactures.name as manuf_name , manufactures.rules as rules_lp FROM advertise JOIN manufactures on advertise.manufacturer_id = manufactures.id WHERE advertise.rules = 1";
$result_av = mysqli_query($connect, $sql);
?>
<div class="grid">
    <div class="slider-wrap">
        <?php foreach ($result_av as $each_av) : ?>
            <div class="brands-img__wrap">
                <?php if ($each_av['rules_lp'] == 1) { ?>
                    <a href="view_brand.php?mb=<?php echo $each_av['manuf_name'] ?>" class="brands__img">
                        <img src="admin/categoris/server/uploads/<?php echo $each_av['photo'] ?>" alt="">
                    </a>
                <?php } else { ?>
                    <a href="view_brand.php?lp=<?php echo $each_av['manuf_name'] ?>" class="brands__img">
                        <img src="admin/categoris/server/uploads/<?php echo $each_av['photo'] ?>" alt="">
                    </a>
                <?php } ?>
            </div>
        <?php endforeach ?>
    </div>
</div>