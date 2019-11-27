<?php
    require_once "..\\functions\check_functions.php";
    user_admin_and_book_changedir();
    require_once "..\configs\db.php";
    $book_id=$_COOKIE['bookid'];
    $query = mysqli_query($connection, "SELECT * FROM `bookinfo` WHERE `id` ='$book_id'");
    $book = $query->fetch_assoc();
    unlink('..\media\books_images\\'.$book['image']);
    mysqli_query($connection,"DELETE FROM `bookinfo` WHERE id = '$book_id'");
    mysqli_query($connection,"DELETE FROM `comments` WHERE `book_id` = '$book_id'");
    mysqli_close($connection);
    setcookie('bookid','0', time()-3600*24,"/");
    header('Location: ..\catalogue.php');


?>