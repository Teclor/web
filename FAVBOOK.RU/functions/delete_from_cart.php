<?php
require_once "check_functions.php";
require_once "..\configs\db_pdo.php";
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/functions/logger.php";
user_check_changedir();
if(isset($_POST['bookid']))
{
    $sql="DELETE FROM `cart` WHERE `user_id`={$_SESSION['user']} AND `book_id`={$_POST['bookid']}";
    Logger::db_query($sql);
    $sql_prepared=DB::prepare($sql);
    $sql_prepared->execute();
    header('Location: ..\cart.php');
}
else{header('Location: ..\cart.php');}
?>