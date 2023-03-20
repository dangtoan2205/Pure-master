
<?php

$connect = mysqli_connect('localhost', 'root', '', 'db_phppure-master');
mysqli_set_charset($connect, 'UTF8');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}