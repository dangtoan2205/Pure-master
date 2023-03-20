<div class="grid_full-width">
    <nav class="breadcrumb_wrap">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa-solid fa-house"></i><a href="./">Home</a></li>
            <?php if(!empty($brand)): ?>
                <li class="breadcrumb-item"><a href="view_brand.php?mb=<?php echo $brand ?>"><?php echo $brand ?></a></li>
            <?php endif; ?>
            <?php if(!empty($brands)): ?>
                <li class="breadcrumb-item"><a href="view_brand.php?lp=<?php echo $brands ?>"><?php echo $brands ?></a></li>
            <?php endif; ?>
            <?php if(!empty($id)): ?>
                <li class="breadcrumb-item"><?php echo $each['name'] ?></li>
            <?php endif; ?>
        </ol>
    </nav>
</div>