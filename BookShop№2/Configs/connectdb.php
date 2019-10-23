<?php
require_once "config.php";
$connection = mysqli_connect($dbase['server'],$dbase['adminname'],$dbase['adminpassword'],$dbase['name']);
mysqli_query($connection,"SET NAMES utf8");
if($connection==false){
    echo 'Connection error <br>';
    echo mysqli_connect_error();
    exit();
}
?>