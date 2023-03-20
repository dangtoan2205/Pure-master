<?php
require '../check_admin_login.php';

require '../root.php';

$manufacturer_id = addslashes($_POST['manufacturer_id']);
$photo = $_FILES['photo'];
$rules = $_POST['rules'];

const PATH_UPLOAD = 'server/uploads/';
$file_extension = explode('.', $photo['name'])[1];
$fileName = time() . '.' . $file_extension;
$path_file = PATH_UPLOAD . $fileName;

move_uploaded_file($photo["tmp_name"], $path_file);

if(empty($file_extension)){
    header('location:form_insert.php?error= Vui lòng thêm ảnh!');
}else{
    $sql = "INSERT INTO `advertise`(`manufacturer_id`, `photo`, rules, created_at, updated_at) VALUES ('$manufacturer_id', '$fileName', '$rules', now(), now())";
}
$query = mysqli_query($connect, $sql);
if ($query) {
    header('location:index.php?success= Thêm thành công');
} else{
    die(mysqli_error($connect));
}
mysqli_close($connect);
