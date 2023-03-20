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

$manufacturer_id = $_POST['manufacturer_id'];
$rules = $_POST['rules'];

if(empty($_POST['id'])){
    header('location:form_update.php?error= Phải điền mã để sửa');
}else{
    header("location:form_update.php?id=$id&error= Phải điền đủ thông tin");
}
    $sql = "UPDATE `advertise`
    SET
    manufacturer_id = '$manufacturer_id',
    photo = '$fileName',
    rules = '$rules',
    updated_at = now()
    WHERE id = '$id'";

$query = mysqli_query($connect, $sql);
if ($query) {
    header('location:index.php?success= Sửa thành công');
} else{
    mysqli_error($connect);
    header('location:index.php?error= Tên nhà sản xuất trùng rồi');
}
mysqli_close($connect);


