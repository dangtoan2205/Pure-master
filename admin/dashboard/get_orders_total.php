<?php
require '../check_admin_login.php';
require '../root.php';

$max_date = $_GET['days'];
$sql = "SELECT  DATE_FORMAT(created_at, '%e-%m') as days,
sum(total_price) as total
FROM `orders` 
WHERE (created_at) >= CURDATE() - INTERVAL $max_date DAY and status = 1
GROUP BY DATE_FORMAT(created_at, '%e-%m')";
$result = mysqli_query($connect, $sql);
$arr = [];
$today = date('d');
if($today < $max_date){
    $get_days = $max_date - $today;
    $last_month = date('m', strtotime(" -1 month"));
    $last_month_date = date('Y-m-d', strtotime(" -1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_date = $max_day_last_month - $get_days;
    for($i = $start_date; $i<=$max_day_last_month; $i++){
        $key = $i . '-' . $last_month;
        $arr[$key] = 0; 
    }
    $start_this_date = 1;
}else {
    $start_this_date = $today - $max_date;
}
$this_month = date('m');
for($i = $start_this_date; $i<=$today; $i++){
    $key = $i . '-' . $this_month;
    $arr[$key] = 0; 
}
foreach ($result as $each){
    $arr[$each['days']] = (int)$each['total'];
}
echo json_encode($arr);