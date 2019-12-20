<?php
require_once "..\configs\db.php";
require_once "..\\functions\check_functions.php";
user_and_book_changedir();

    $id = $_COOKIE['bookid'];

    if (!$_POST) {
        header('Location: ..\catalogue.php');
    } else {
        $text = $_POST['descr'];
    }
    if (!preg_match("/^[0-9a-zA-ZА-Яа-я@_!.,\"+\-\s]/", $text)) header('Location: ..\catalogue.php');
    $current_user_id = $_SESSION['user'];
    $name = mysqli_query($connection, "SELECT * FROM `privateinfo` WHERE `user_id`='$current_user_id'");
    $name = $name->fetch_assoc();
    $name = $name['name'];
    mysqli_query($connection, "INSERT INTO `comments` (`author`,`book_id`,`text` ) VALUES ('$name','$id','$text')");
    header('Location: ..\comments.php');

?>