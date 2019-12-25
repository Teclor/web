<?php
require_once "..\configs\db_pdo.php";
require_once "check_functions.php";
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/functions/logger.php";
user_check_changedir();
if($_POST['book_id']) {
    $book_id=$_POST['book_id'];
    $user_id = $_SESSION['user'];
    $exists=check_book_in_cart($book_id,$user_id);
    if(!$exists) {
        $sql = "INSERT INTO `cart` (`user_id`,`book_id`) VALUES ('$user_id','$book_id')"; Logger::db_query($sql);
        $sql_prepared = DB::prepare($sql);
        $sql_prepared->execute();
    }
    header('Location: ..\catalogue.php');
}
else{header('Location: ..\catalogue.php');}

?>