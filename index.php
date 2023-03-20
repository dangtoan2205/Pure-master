<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopdemo021</title>
    <link rel="stylesheet" href="./public/css/rss.css" />
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/pages.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    
<body>
    <div class="wrapper">
        <?php include './partials/sticky.php' ?>
        <?php include './partials/container.php' ?>
        <?php include './partials/footer.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script> -->
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    
    <script src="./public/js/js.js"></script>
    <script src="./public/js/slider.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".btn-add-to-cart").click(function() {
            let id = $(this).data('id');
            // alert("Add to cart" + id);
            $.ajax({
              url: 'add_to_cart.php',
              type: 'GET',
              // dataType:'',
              data: {id},
            })
            .done(function(response){
              console.log("success");
              if(response == 1){
                alert('Thêm giỏ hàng thành công');
              }else {
                alert(response);  
              }
            });
        });
      });
      function Suc() {
        return alert("Thêm giỏ hàng thành công!");
      }
    </script>
    <script src="./public/js/live-searchs.js"></script>
   
</body>
</html>