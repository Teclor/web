<?php
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/configs/db_pdo.php";
if(!isset($_SESSION['user']))session_start();
class Logger
{
static public function log($action,$text){
    $user=0;
    if(isset($_SESSION['user']))$user=$_SESSION['user'];
    $query="INSERT INTO `user_logs` (`user_id`,`action`,`text`) VALUES (?,?,?)";
    DB::execute($query,[$user,$action,$text]);
}
    static public function log_visit(){
        $user=0;
        if(isset($_SESSION['user']))$user=$_SESSION['user'];
        $action='VISIT';
        $text = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
        $query="INSERT INTO `user_logs` (`user_id`,`action`,`text`) VALUES (?,?,?)";
        DB::execute($query,[$user,$action,$text]);
    }
    static public function db_query($text){
        $user=0;
        if(isset($_SESSION['user']))$user=$_SESSION['user'];
        $action = 'DB QUERY';
        $query="INSERT INTO `user_logs` (`user_id`,`action`,`text`) VALUES (?,?,?)";
        DB::execute($query,[$user,$action,$text]);
    }
}
?>