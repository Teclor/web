<?php
if($_POST['bookid']) {
    $id=$_POST['bookid'];
    setcookie('bookid',$id, time()+3600*24,"/");
    header('Location: ..\bookpage.php');
}
else{header('Location: ..\catalogue.php');}
?>