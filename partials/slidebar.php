<?php
$sql = "SELECT advertise.*, 
    manufactures.name as manuf_name,
    manufactures.rules as manuf_rule
    FROM advertise JOIN manufactures on advertise.manufacturer_id = manufactures.id 
    WHERE advertise.rules = 2 ORDER BY `advertise`.`id` DESC";
$result_sb = mysqli_query($connect, $sql);
$sql = "SELECT advertise.*, 
    manufactures.name as manuf_name,
    manufactures.rules as manuf_rule
    FROM advertise JOIN manufactures on advertise.manufacturer_id = manufactures.id 
    WHERE advertise.rules = 3 ORDER BY `advertise`.`id` ASC";
$result_sbt = mysqli_query($connect, $sql);
?>
<div class="content__sidebar">
    <?php foreach ($result_sb as $each_sb) : ?>
        <div class="sidebar__img">
            <?php if ($each_sb['manuf_rule'] == 1) { ?>
                <a class="brands__img" href="view_brand.php?mb=<?php echo $each_sb['manuf_name'] ?>">
                    <img src="admin/categoris/server/uploads/<?php echo $each_sb['photo'] ?>" alt="">
                </a>
            <?php } else { ?>
                <a class="brands__img" href="view_brand.php?lp=<?php echo $each_sb['manuf_name'] ?>">
                    <img src="admin/categoris/server/uploads/<?php echo $each_sb['photo'] ?>" alt="">
                </a>
            <?php } ?>
        </div>
    <?php endforeach ?>
    <?php foreach ($result_sbt as $each_sbt) : ?>
        <div class="sidebar__img">
            <?php if ($each_sbt['manuf_rule'] == 1) { ?>
                <a class="brands__img" href="view_brand.php?mb=<?php echo $each_sbt['manuf_name'] ?>">
                    <img src="admin/categoris/server/uploads/<?php echo $each_sbt['photo'] ?>" alt="">
                </a>
            <?php } else { ?>
                <a class="brands__img" href="view_brand.php?lp=<?php echo $each_sbt['manuf_name'] ?>">
                    <img src="admin/categoris/server/uploads/<?php echo $each_sbt['photo'] ?>" alt="">
                </a>
            <?php } ?>
        </div>
    <?php endforeach ?>
</div>