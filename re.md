// thay thế button dòng 68 tại partials/container.php => làm ajax
<a href="add_to_cart.php?id=<?php echo $each['id'] ?>">
    Thêm vào giỏ hàng
</a>
<button class="btn-add-to-cart" data-id='<?php echo $each['id'] ?>'>
    Thêm vào giỏ hàng
</button>

// thay thế button dòng 34 , 42 tại detail/detail_cart.php => làm ajax
<a href="add_to_cart.php?id=<?php echo $each['id'] ?>">
<a class="cart_type" onclick="return Del('<?php echo $each['quantity']; ?>')" href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">-</a>

<div class="cart_type cart-quantity"> <?php echo $each['quantity'] ?></div>
<a class="cart_type" onclick="return Inc('<?php echo $each['quantity']; ?>')" href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">+</a>
// xoa
<a class="cart_type" href="delete_from_cart.php?id=<?php echo $id ?>">Xóa</a>
