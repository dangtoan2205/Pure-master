<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($current_page > 1 && $total_page > 1) { ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo  ($current_page - 1) ?>">Prev</a>
            </li>
        <?php } ?>
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
            <li class="page-item">
                <?php if ($i == $current_page) { ?>
                    <span class="page-link text-muted"><?php echo  $i ?></span>
                <?php } else { ?>
                    <a class="page-link" href="index.php?page=<?php echo  $i ?>"><?php echo  $i ?></a>
                <?php } ?>
            </li>
        <?php } ?>
        <?php if ($current_page < $total_page && $total_page > 1) { ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo  ($current_page + 1) ?>">Next</a>
            </li>
        <?php } ?>
    </ul>
</nav>