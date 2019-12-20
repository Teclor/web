<?php
require_once "..\configs\db_pdo.php";
require_once "..\\functions\check_functions.php";

admin_check_changedir();

if(!isset($_POST['report_type'])){
    error_exit('Не выбран тип отчета!');
}
$type=$_POST['report_type'];
if($type=='Статистика по заказам за последний месяц') {
    $delivered = "SELECT COUNT(*) FROM `orders` WHERE `status`='Доставлен'";
    $delivered = DB::query($delivered)->fetch(PDO::FETCH_NUM);
    $intransit = "SELECT COUNT(*) FROM `orders` WHERE `status`='В пути'";
    $intransit = DB::query($intransit)->fetch(PDO::FETCH_NUM);
    $instock = "SELECT COUNT(*) FROM `orders` WHERE `status`='На складе'";
    $instock = DB::query($instock)->fetch(PDO::FETCH_NUM);
    $income = "SELECT SUM(total_price) FROM `orders` WHERE `status`='Доставлен'";
    $income = DB::query($income)->fetch(PDO::FETCH_NUM);
    $report="Количество доставленных заказов: ".$delivered[0]."<br>"."Количество заказов в пути: ".$intransit[0]."<br>"."Количество заказов на складе: ".$instock[0]."<br>"."Прибыль с доставленных заказов: ".$income[0]."<br>";
}
if($type=='Топ заказчиков за последний месяц') {
    $top_customers = "SELECT `name` FROM `privateinfo` WHERE (SELECT SUM(total_price) FROM `orders` WHERE `status`='Доставлен' AND privateinfo.user_id = orders.user_id)>1000 group by name";
    $top_customers = DB::query($top_customers);
    $result=array();
    $i=0;
    while($row=$top_customers->fetch(PDO::FETCH_ASSOC)){
        $result[$i]=$row;
        $i++;
    }
    for ($j=0; $j<$i; $j++){
        $number_of_orders = "SELECT COUNT(*) FROM `orders` WHERE `user_id` = $j+1";
        $number_of_orders = DB::query($number_of_orders)->fetch(PDO::FETCH_NUM);
        $result[$j]['number_of_orders'] = $number_of_orders[0];
    }
    for ($j=0; $j<$i; $j++){
        $sum_of_orders = "SELECT SUM(total_price) FROM `orders` WHERE `user_id` = $j+1";
        $sum_of_orders = DB::query($sum_of_orders)->fetch(PDO::FETCH_NUM);
        $result[$j]['$sum_of_orders'] = $sum_of_orders[0];
    }
    $report ="Топ заказчиков: "."<br>";
    for ($j=0; $j<$i; $j++){
        $report = $report.($j+1).") ".$result[$j]['name']." - ".$result[$j]['number_of_orders']." заказов на общую сумму: ".$result[$j]['$sum_of_orders']."<br>";
    }
}

if($type=='Статистика заказанных книг по жанру') {
    $best_category=array('Российская художественная литература'=>0,
        'Зарубежная художественная литература'=>0,
        'Учебная литература'=>0,
        'Научная литература'=>0,
        );
    $sql="SELECT `category` FROM `bookinfo` INNER JOIN `ordered_books` WHERE bookinfo.id=ordered_books.book_id";
    $categories=DB::query($sql);
    $i=0;
    while($row[$i]=$categories->fetch(PDO::FETCH_NUM)){
        if($row[$i][0]=='Российская художественная литература') $best_category['Российская художественная литература']++;
        if($row[$i][0]=='Зарубежная художественная литература')$best_category['Зарубежная художественная литература']++;
        if($row[$i][0]=='Учебная литература')$best_category['Учебная литература']++;
        if($row[$i][0]=='Научная литература')$best_category['Научная литература']++;
        ++$i;
    }
   $report = "Топ популярных жанров по количеству купленных книг: <br> Российская художественная литература - ".$best_category['Российская художественная литература'].
        "<br> Зарубежная художественная литература - ".$best_category['Зарубежная художественная литература'].
        "<br> Учебная литература - ".$best_category['Учебная литература'].
        "<br> Научная литература - ".$best_category['Научная литература'];
}

if ($type=='Отчет об эффективности скидок'){
    $on_sale=DB::query("SELECT `book_id` FROM `sale`");
    while ($row = $on_sale->fetch(PDO::FETCH_ASSOC)) {
        $ids[] = $row;
    }
    $i=0;
    $report="Количество купленных по скидке книг: <br>";
    while(isset($ids[$i])){
        $id=$ids[$i]['book_id'];
        $book_name=DB::query("SELECT `bookname` FROM `bookinfo` WHERE `id`='$id'")->fetch(PDO::FETCH_ASSOC);
        $bought=DB::query("SELECT COUNT(*) FROM `ordered_books` WHERE `book_id`='$id'")->fetch(PDO::FETCH_NUM);
        $report.=($i+1).") ".$book_name['bookname']." Куплен ".$bought[0]." раз <br>";
        ++$i;
    }
}

if ($type == 'Статистика пунктов выдачи'){
    $distrib_points = "SELECT `id`,`point_name`,`user_rating` FROM `distribution_points`";
    $distrib_points = DB::query($distrib_points);
    $result=array();
    $i=0;
    while($row=$distrib_points->fetch(PDO::FETCH_ASSOC)){
        $result[$i]=$row;
        $i++;
    }
    for($j=0;$j<$i;$j++){
        $number_of_orders = "SELECT COUNT(*) FROM `orders` WHERE `id_distrib_point` = '$j'+1 AND `status` = 'Доставлен'";
        $number_of_orders = DB::query($number_of_orders)->fetch(PDO::FETCH_NUM);
        $result[$j]['number_of_orders'] = $number_of_orders[0];
    }
    $report ="Статистика пунктов выдачи: "."<br>";
    for ($j=0; $j<$i; $j++){
        $report = $report.($j+1).") ".$result[$j]['point_name']." - ".$result[$j]['number_of_orders']." заказов доставлено, средняя оценка пользователей -  ".$result[$j]['user_rating']."<br>";
    }
}

if ($type=='Статистика обратной связи по дням'){
    $date = "SELECT DISTINCT(`date`) FROM `feedback`";
    $date = DB::query($date);
    $day_for_output=array();
    $i=0;
    while($row=$date->fetch(PDO::FETCH_ASSOC)){
        $day_for_output[$i]=$row;
        $i++;
    }
    for ($j = 0; $j < $i; $j++){
        $date_for_check = $day_for_output[$j]['date'];
        $report = $report."Фидбек за ".$date_for_check.":<br>";
        $info = "SELECT `text` FROM `feedback` WHERE `date`= '$date_for_check'";
        $info = DB::query($info);
        $result=array();
        $k=0;
        while($row=$info->fetch(PDO::FETCH_ASSOC)){
            $result[$k]=$row;
            $k++;
        }
        for($g=0; $g < $k; $g++){
            $report = $report.($g+1).") ".$result[$g]['text']."<br>";
        }
    }
}


setcookie('report', $report,time()+60,'/');
header('Location: ..\reports.php');
