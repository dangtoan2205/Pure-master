<?php 
require 'admin/root.php';

$search = trim(addslashes($_GET['term']));

$sql = "SELECT * from products where name like '%$search%' ";
$result_mobi = mysqli_query($connect, $sql);

$sql = "SELECT * from product_laptop where name like '%$search%' ";
$result_laptop = mysqli_query($connect, $sql);

$arr_mobi = [];
foreach ($result_mobi as $each) {
    $arr_mobi[] = [
        'label' => $each['name'],
        'value' => 'id'."=".$each['id'],
        'photo' => $each['photo'],
        'price' => currency_format($each['price'])
    ];
}
$arr_laptop = [];
foreach ( $result_laptop as $each) {
    $arr_laptop[] = [
        'label' => $each['name'],
        'value' => 'lap_id'."=".$each['id'],
        'photo_lp' => $each['photo'],
        'price' => currency_format($each['price'])
    ];
}

$result = array_merge($arr_mobi, $arr_laptop);

// if (!empty(array_column($result, 'value'))) {
//     print_r(array_column($result, 'value_lp'));
// }else{
//     echo '123';
// }
echo json_encode($result);
mysqli_close($connect);
