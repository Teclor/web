<?php
require "db.php";
mysqli_query($connection,"SET NAMES utf-8");
$query=mysqli_query($connection, "SELECT * FROM `bookinfo`");

$count = mysqli_query($connection,"SELECT COUNT(1) FROM `bookinfo`");
$b = mysqli_fetch_array($count);
$n=$b[0];
for($i=0; $i<$n; ++$i) {
    $bookinfo[$i] = $query->fetch_assoc();
}
?>