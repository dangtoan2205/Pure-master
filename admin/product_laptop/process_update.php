<?php
require '../check_admin_login.php';
const PATH_UPLOAD = 'server/uploads/';
require '../root.php';

$id = $_POST['id'];
$photo_new = $_FILES['photo_new'];
if($photo_new['size'] > 0){
    $file_extension = explode('.', $photo_new['name'])[1];
    $fileName = time() . '.' . $file_extension;
    $path_file = PATH_UPLOAD . $fileName;
    move_uploaded_file($photo_new["tmp_name"], $path_file);
} else{
    $fileName = $_POST['photo_old'];
}

$name = addslashes($_POST['name']);
$name = strip_tags($name);

$photo = $_FILES['photo'];
$price = addslashes($_POST['price']);
$price = strip_tags($price);

$descriptions = trim(addslashes($_POST['descriptions']));
$manufacturer_id = $_POST['manufacturer_id'];



if(empty($_POST['id'])){
    header('location:form_update.php?error= Phải điền mã để sửa');
    exit;
}elseif(empty($_POST['name']) || empty($_POST['price'])|| empty($_POST['descriptions'])){
    header("location:form_update.php?id=$id&error= Phải điền đủ thông tin");
}else{

    $sql = "UPDATE `product_laptop`
    SET
    name = '$name',
    photo = '$fileName',
    price = '$price',
    descriptions = '$descriptions',
    manufacturer_id = '$manufacturer_id'
    WHERE id = '$id'";
}
$query = mysqli_query($connect, $sql);
if ($query) {
    header("location:config_update.php?id=$id&success= Sửa thành công ,vui lòng sửa cả thông số cho sản phẩm");
    // header('location:index.php?');
} else{
    mysqli_error($connect);
    header('location:index.php?error= Tên sản phẩm trùng rồi');
}
mysqli_close($connect);
