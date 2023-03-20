<?php
require '../check_admin_login.php'; 
require '../root.php';

$name = trim(addslashes($_POST['name']));
$name = strip_tags($name);
$photo = $_FILES['photo'];
$price = addslashes($_POST['price']);
$price = strip_tags($price);

$descriptions = trim(addslashes($_POST['descriptions']));
$slug = trim(addslashes($_POST['slug']));
$manufacturer_id = $_POST['manufacturer_id'];

const PATH_UPLOAD = 'server/uploads/';
$file_extension = explode('.', $photo['name'])[1];
$fileName = time() . '.' . $file_extension;
$path_file = PATH_UPLOAD . $fileName;

move_uploaded_file($photo["tmp_name"], $path_file);


if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['descriptions']) || empty($_POST['slug'])){
    header('location:form_insert.php?error= Phải điền đủ thông tin');
}else{
    $sql = "SELECT * from products
    where `name` = '$name'";
    $result = mysqli_query($connect, $sql);
    if(!(mysqli_num_rows($result) == 1)){
        $sql = "INSERT INTO `products`(`name`, `photo`, `price`, `descriptions`, `slug`, `manufacturer_id`)
        VALUES ('$name', '$fileName', '$price', '$descriptions', '$slug', '$manufacturer_id')";
        mysqli_query($connect, $sql);
        header('location:index.php?success= Thêm thành công');
    }else{
        header('location:index.php?error=Tên sản phẩm đã tồn tại');
    }
}
mysqli_close($connect);
