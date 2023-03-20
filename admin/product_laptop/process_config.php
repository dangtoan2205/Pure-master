<?php 
require '../check_admin_login.php';
require '../root.php';

$ram = trim(addslashes($_POST['ram']));
$ram = strip_tags($ram);

$ssd = trim(addslashes($_POST['ssd']));
$ssd = strip_tags($ssd);

$cpu = trim(addslashes($_POST['cpu']));
$cpu = strip_tags($cpu);

$screen = trim(addslashes($_POST['screen']));
$screen = strip_tags($screen);

$name_id = trim(addslashes($_POST['name_id']));

if (empty($_POST['ram']) || empty($_POST['ssd']) || empty($_POST['cpu']) || empty($_POST['screen']) || empty($_POST['name_id'])) {
    header('location:add_config_laptop.php?error= Phải điền đủ thông tin');
} else {
    $sql = "SELECT max(id) from product_laptop
    where `name` = '$name_id'";
    $result = mysqli_query($connect, $sql);
    $each_id = mysqli_fetch_array($result)['max(id)'];

    $sql = "UPDATE `config_product_laptop`(`pro_laptop_id`, `config_laptop_id`, `values`)
    SET  ('$each_id', '1', '$ram'),
            ('$each_id', '2', '$ssd'),
            ('$each_id', '3', '$cpu'),
            ('$each_id', '4', '$screen')";
    mysqli_query($connect, $sql);
    header('location:index.php?success= Sửa thành công');
}
mysqli_close($connect);