<?php
if(!isset($_SESSION['user']))session_start();
function user_check(){
    if(!isset($_SESSION['user'])) {header('Location: signin.php'); exit(1);}
}
function user_check_changedir(){
    if(!isset($_SESSION['user'])) {header('Location: ../signin.php'); exit(1);}
}

function admin_check(){
    if(!isset($_SESSION['user'])) {header('Location: cabinet.php'); exit(1);}
    elseif($_SESSION['user'] != 1) {header('Location: cabinet.php'); exit(1);}
}
function admin_check_changedir(){
    if(!isset($_SESSION['user'])) {header('Location: ..\cabinet.php'); exit(1);}
    elseif($_SESSION['user'] != 1) {header('Location: ..\cabinet.php'); exit(1);}
}
function user_and_book_changedir(){
    if(!isset($_SESSION['user'])) {header('Location: ..\cabinet.php'); exit(1);}
    elseif(!isset($_COOKIE['bookid']) || !preg_match("/^[0-9]/", $_COOKIE['bookid'])) {header('Location: ..\cabinet.php'); exit(1);}
}
function user_admin_and_book(){
    if(!isset($_SESSION['user'])) {header('Location: cabinet.php'); exit(1);}
    elseif($_SESSION['user'] != 1) {header('Location: cabinet.php'); exit(1);}
    elseif(!isset($_COOKIE['bookid']) || !preg_match("/^[0-9]/", $_COOKIE['bookid'])) {header('Location: cabinet.php'); exit(1);}
}
function book_check(){
    if(!isset($_COOKIE['bookid']) || !preg_match("/^[0-9]/", $_COOKIE['bookid'])) {header('Location: cabinet.php'); exit(1);}
}
function book_check_changedir(){
    if(!isset($_COOKIE['bookid']) || !preg_match("/^[0-9]/", $_COOKIE['bookid'])) {header('Location: ..\cabinet.php'); exit(1);}
}
function user_admin_and_book_changedir(){
    if(!isset($_SESSION['user'])) {header('Location: ..\cabinet.php'); exit(1);}
    elseif($_SESSION['user'] != 1) {header('Location: ..\cabinet.php'); exit(1);}
    elseif(!isset($_COOKIE['bookid']) || !preg_match("/^[0-9]/", $_COOKIE['bookid'])) {header('Location: ..\cabinet.php'); exit(1);}
}
function check_book_in_cart($book_id,$user_id){
    $compare=false;
    $sql="SELECT `book_id` FROM `cart` WHERE `user_id`='$user_id'";
    $result=DB::query($sql);
    $i=1;
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $res[] = $row[0];
        $i++;
    }
    if(isset($res) )if(in_array($book_id,$res) || $i>7)$compare=true;
    return $compare;

}
function error_exit($error){
    setcookie("error", $error, time()+60,"/");
    header("Location: default_error_handler.php");
    exit();
}
?>