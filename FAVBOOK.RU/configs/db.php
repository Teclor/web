<?php
require_once "config.php";
$connection = mysqli_connect($db['server'],$db['adminname'],$db['adminpassword'],$db['name']);
mysqli_query($connection,"SET NAMES utf8"); mysqli_query($connection, "COLLATE 'utf8'");
if($connection==false){
    echo 'Connection error <br>';
    echo mysqli_connect_error();
    exit();
}
?>