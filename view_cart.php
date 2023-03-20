<?php

session_start();

require 'admin/root.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop demo Cart</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/view_all.css" />
    <link rel="stylesheet" href="./public/css/breadcrumb.css" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

</head>

<body>
    <div class="wrapper">
        <?php include './partials/sticky.php' ?>
        <?php include './detail/detail_cart.php' ?>
        <?php include './partials/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./public/js/js.js"></script>
    <script src="./public/js/slider.js"></script>
    <script src="./public/js/live-searchs.js"></script>

    <script>
        $(document).ready(function() {
            $(".btn-update-quantity").click(function() {
                let btn = $(this);
                let id = btn.data('id');
                let type = btn.data('type');
                $.ajax({
                        url: 'update_quantity_in_cart.php',
                        type: 'GET',
                        // dataType:'',
                        data: {
                            id,
                            type
                        },
                    })
                    .done(function() {
                        let parent_col = btn.parents('.row-cart-js'); // goi den tk cha xa su cua no
                        let price = parent_col.find('.cart-price').text();
                        let quantity = parent_col.find('.cart-quantity').text();
                        if (type === 'decre') {
                            quantity--;
                        }
                        if (type === 'incre') {
                            if (quantity < 3) {
                                quantity++;
                            } else {
                                confirm("Sản phẩm đã đạt mức tối đa");
                            }
                        }
                        if (quantity === 0) {
                            parent_col.remove();
                        } else {
                            parent_col.find('.cart-quantity').text(quantity);
                            console.log(quantity);
                            let sum = (price * quantity);
                            parent_col.find('.cart-total').text(sum);
                        }
                        getTotal();

                    });
            });
            $(".btn-cart-delete").click(function() {
                let btn = $(this);
                let id = btn.data('id');
                $.ajax({
                        url: 'delete_from_cart.php',
                        type: 'GET',
                        // dataType:'',
                        data: {
                            id
                        },
                    })
                    .done(function() {
                        btn.parents('.row-cart-js').remove();
                        getTotal();
                    });
            });
        });

        function getTotal() {
            let total = 0;
            $(".cart-total").each(function() {
                total += parseFloat($(this).text());
            });
            total = total.toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            });
            $("#sum_quantity").text(total);
        }

        function Del($id){
            if ($id <= 1){
                return confirm("Bạn có chắc xóa sản phẩm ??");
            }
        }
        function Inc($id){
            if ($id >= 3){
                return confirm("Sản phẩm đã đạt mức tối đa");
            }
        }
    </script>
    
</body>

</html>