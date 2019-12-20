<?php
require_once "..\configs\db_pdo.php";
require_once "..\\functions\check_functions.php";
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/functions/logger.php";
user_check_changedir();
if(isset($_POST['order_id'])){
    DB::query("DELETE FROM `orders` WHERE `id`='$_POST[order_id]'");
    Logger::db_query("DELETE FROM `orders` WHERE `id`='$_POST[order_id]'");
    DB::query("DELETE FROM `ordered_books` WHERE `order_id`='$_POST[order_id]'");
    Logger::db_query("DELETE FROM `ordered_books` WHERE `order_id`='$_POST[order_id]'");
    setcookie('success','Заказ успешно отменён', time()+60, '/');
    header('Location: default_error_handler.php');
}
else{
    setcookie('error','Невозможно отменить неизвестный заказ!', time()+60, '/');
    header('Location: default_error_handler.php');
}

?>