<?php
$connection = mysqli_connect('localhost','root','','crbooks');
mysqli_query($connection,"SET NAMES utf8"); mysqli_query($connection, "COLLATE 'utf8'");
if($connection==false){
    echo 'Connection error <br>';
    echo mysqli_connect_error();
    exit();
}
?>