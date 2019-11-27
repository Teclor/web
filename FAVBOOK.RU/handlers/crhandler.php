<?php
require "..\configs\db.php";
if(!$_POST){
    header('Location: ..\admincr.php');
    exit();
}
if(!$_POST['category'] || !$_POST['price'] || !$_POST['bookname'] || !$_POST['year']){
    header('Location: ..\admincr.php');
    exit();
}
$cat= $_POST['category'];
$pr= $_POST['price'];
$bn= $_POST['bookname'];
$yr= $_POST['year'];
$desc= $_POST['descr'];

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
    $allowed =  array('gif','png' ,'jpg');
    $filename = $_FILES["filename"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) || $_FILES['filename']['error'] != 0 ) {
        echo 'Ошибка загрузки файла. Номер ошибки: ' . $_FILES['filename']['error'] . '<br><a href="..\admincr.php">Назад</a>"';
        exit();
    }
    else {
        move_uploaded_file
        (
            $_FILES["filename"]["tmp_name"],
            ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"]
        );
        $filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"];
        $imagename = $_FILES["filename"]["name"];
// задание максимальной ширины и высоты
        $width = 500;
        $height = 500;
// получение новых размеров
        list($width_orig, $height_orig) = getimagesize($filename);
       /* $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width_new = $height*$ratio_orig;
        } else {
            $height_new = $width/$ratio_orig;
        }*/
// ресэмплирование
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// вывод
        imagejpeg($image_p, $filename, 100);
    }

}
$sql = "INSERT INTO `bookinfo` (`category`, `bookname`, `price`, `pubdate`,`image`,`description` ) VALUES ('$cat','$bn','$pr','$yr','$imagename','$desc')";
if (mysqli_query($connection, $sql)) {
    require_once "..\includes\crud_handler_page.php";
    $id=$connection->insert_id;
    $new_filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $id.".jpg";
    rename ( $filename , $new_filename);
    $imagename = $id.".jpg";
    if(!mysqli_query($connection, "UPDATE `bookinfo` SET `image`='$imagename' WHERE `id`= '$id'")) echo "Error: " . $sql . "<br>" . mysqli_error($connection);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>