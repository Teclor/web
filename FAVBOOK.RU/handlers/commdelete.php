<?php
require_once "..\configs\db.php";
if(!$_POST){header('Location: ..\comments.php');}
else{
    if(!preg_match("/^[0-9]/", $_POST['commid'])) header('Location: ..\comments.php');
    else{
    $comment_id=$_POST['commid'];
    mysqli_query($connection,"DELETE FROM `comments` WHERE id = '$comment_id'");
    header('Location: ..\comments.php');
    }
}
?>