<?php
session_start();
function user_check(){
    if(!isset($_SESSION['user'])) {header('Location: signin.php'); exit(1);}
}
function admin_check(){
    if(!isset($_SESSION['user'])) {header('Location: cabinet.php'); exit(1);}
    elseif($_SESSION['user'] != 1) {header('Location: cabinet.php'); exit(1);}
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
?>