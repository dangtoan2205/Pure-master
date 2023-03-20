<?php if(isset($_GET['error'])){ ?>
        <h5 class="text-center my-3 alert alert-danger">
            <?php
                echo $_GET['error'];
            ?>
        </h5>
<?php } ?>

<?php if(isset($_GET['success'])){ ?>
    <h5 class="text-center my-3 alert alert-success">
        <?php
            echo $_GET['success'];
        ?>
    </h5>
<?php } ?>