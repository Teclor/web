<?php
require_once "..\configs\db_pdo.php";
require_once "..\\functions\check_functions.php";
user_check_changedir();
if(!isset($_POST['message']) || !preg_match("/^[0-9a-zA-ZА-Яа-я_\.\,\"\+\-\s]/", $_POST['message'])){
    header('Location: ..\cabinet.php');
    exit();
}
$sql="INSERT INTO `feedback` (`user_id`,`text`) VALUES ('$_SESSION[user]','$_POST[message]')";
$sql_prepared=DB::prepare($sql);
$sql_prepared=$sql_prepared->execute();
if($sql_prepared)
    setcookie('success','Ваш отзыв отправлен успешно!',time()+60, '/');
else
    setcookie('error', 'Отзыв не был отправлен!',time() + 60, '/');
header('Location: default_error_handler.php');
?>