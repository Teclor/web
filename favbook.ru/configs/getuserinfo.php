<?php
mysqli_query($connection,"SET NAMES utf-8");
$userid=$_COOKIE['user'];
$query=mysqli_query($connection, "SELECT * FROM `privateinfo` WHERE `user_id` = '$userid'");
$userinfo=$query->fetch_assoc();
?>