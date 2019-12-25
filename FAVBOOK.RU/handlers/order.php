<?php
require_once "..\configs\db_pdo.php";
require_once "..\\functions\check_functions.php";
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/functions/logger.php";
user_check();
$query="SELECT * FROM `cart` WHERE `user_id` = '$_SESSION[user]'";
$cart=DB::query($query);
if($cart->rowCount()>0){
    $total_price=0;
    while($row=$cart->fetch(PDO::FETCH_ASSOC)){
        $ordered_books[]=$row;
        $book_id=DB::query("SELECT `price` FROM `bookinfo` WHERE `id`='$row[book_id]'");
        $book_price=$book_id->fetch(PDO::FETCH_ASSOC);
        $total_price+=$book_price['price'];
    }
    $delivery_date = date("Y-m-d H:i:s",strtotime("+3 days"));
    DB::query("INSERT INTO `orders` (`user_id`,`delivery_date`,`total_price`) VALUES ('$_SESSION[user]','$delivery_date','$total_price')");
    Logger::db_query("INSERT INTO `orders` (`user_id`,`delivery_date`,`total_price`) VALUES ('$_SESSION[user]','$delivery_date','$total_price')");
    $order_id=DB::lastInsertId();
    $i=0;
    while(isset($ordered_books[$i])) {
        $book_id=$ordered_books[$i]['book_id'];
        DB::query("INSERT INTO `ordered_books` (`order_id`,`book_id`) VALUES('$order_id','$book_id')");
        Logger::db_query("INSERT INTO `ordered_books` (`order_id`,`book_id`) VALUES('$order_id','$book_id')");
        ++$i;
    }
    DB::query("DELETE FROM `cart` WHERE `user_id`='$_SESSION[user]'"); Logger::db_query("DELETE FROM `cart` WHERE `user_id`='$_SESSION[user]'");
    setcookie('success','Заказ успешно оформлен и будет доставлен по указанному в профиле адресу!', time()+60, '/');
    header('Location: default_error_handler.php');
}
else{
    setcookie('error','Ваша корзина пуста!', time()+60, '/');
    header('Location: default_error_handler.php');
}

?>