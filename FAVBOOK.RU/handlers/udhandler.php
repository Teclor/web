<?php
require "..\configs\db.php";
if(!$_POST){
    header('Location: ..\adminud.php');
    exit();
}
if(!$_POST['category'] || !$_POST['price'] || !$_POST['bookname'] || !$_POST['year'] || !$_POST['id'] || !$_POST['img']){
    header('Location: ..\adminud.php');
    exit();
}
$cat= $_POST['category'];
$pr= $_POST['price'];
$bn= $_POST['bookname'];
$yr= $_POST['year'];
$desc= $_POST['descr'];
$id = $_POST['id'];
$imagename = $_POST['img'];
if(!preg_match("/^[0-9a-zA-ZА-Яа-я\s]/", $cat) ||
    !preg_match("/^[0-9a-zA-ZА-Яа-я\s]/", $desc) ||
    !preg_match("/^[0-9a-zA-ZА-Яа-я\"\+\-\s]/", $bn) ||
    !preg_match("/^[0-9]/", $pr) ||
    !preg_match("/^[0-9]{4}/", $yr)){
        header('Location: ..\admincr.php');
        exit();
}
if ($_FILES)
{
    $allowed =  array('jpeg','jpg');
    $filename = $_FILES["filename"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($_FILES['filename']['error'] != UPLOAD_ERR_NO_FILE && $_FILES['filename']['error'] != 0) {
        echo 'Ошибка загрузки файла. Номер ошибки: ' . $_FILES['filename']['error'] . '<br><a href="..\adminud.php">Назад</a>';
        exit();
    }
    elseif (in_array($ext,$allowed)){
        if(move_uploaded_file
        (
            $_FILES["filename"]["tmp_name"],
            ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"]
        )) {
            unlink('..\media\books_images\\'.$imagename);
            $filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"];
            $imagename = $id .".jpg";
// задание максимальной ширины и высоты
            $width = 500;
            $height = 500;
// получение новых размеров
            list($width_orig, $height_orig) = getimagesize($filename);
           /*  $ratio_orig = $width_orig/$height_orig;
             if ($width/$height > $ratio_orig) {
                 $width = $height*$ratio_orig;
             } else {
                 $height = $width/$ratio_orig;
             }*/
// ресэмплирование
            $image_p = imagecreatetruecolor($width, $height);
            $image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// вывод
            unlink($filename);
            $filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $id .".jpg";
            imagejpeg($image_p, $filename, 100);
        }
    }
}
$sql = "UPDATE `bookinfo` SET `category` = '$cat',`bookname` = '$bn', `price` = '$pr', `pubdate`='$yr', `description` = '$desc', `image`='$imagename' WHERE `id`= '$id'";
if (mysqli_query($connection, $sql)) {
    require_once "..\includes\crud_handler_page.php";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>