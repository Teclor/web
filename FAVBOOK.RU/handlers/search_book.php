<?php
require_once "..\configs\db_pdo.php";
function search ($query)
{

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $output= array('msg'=> '<p>Слишком короткий поисковый запрос.</p>', 'number' =>0, 'res'=>NULL);
        } else if (strlen($query) > 128) {
            $output= array('msg'=> '<p>Слишком длинный поисковый запрос.</p>', 'number' =>0, 'res'=>NULL);
        } else {
            $q="SELECT * FROM `bookinfo` WHERE `category` LIKE '%$query%'
                  OR `bookname` LIKE '%$query%' OR `description` LIKE '%$query%'
                  OR `price` LIKE '%$query%'";
            $result=DB::prepare($q);
            if(!$result->execute()){header('Location: ../catalogue.php'); exit();}
            if ($result->rowCount() > 0) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $num = $result->rowCount();

                $output=array('res'=>array(),
                'msg'=>'<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>',
                    'number'=>$num);
                $i=0;
                do {
                    $q1 = "SELECT * FROM `bookinfo` WHERE `id` = '$row[id]'";
                    $select_query= DB::prepare($q1);
                    $select_query ->execute();

                    if ($select_query->rowCount() > 0) {
                        $output['res'][$i] = $select_query->fetch(PDO::FETCH_ASSOC);
                        ++$i;
                    }

                } while ($row = $result->fetch(PDO::FETCH_ASSOC));
            } else {
                $output= array('msg'=> '<p>По вашему запросу ничего не найдено.</p>', 'number' =>0, 'res'=>NULL);
            }
        }
    } else {
        $output= array('msg'=> '<p>Задан пустой поисковый запрос.</p>', 'number' =>0, 'res'=>NULL);
    }

    return $output;
}



if (!empty($_POST['query'])) {
    $search_result = search($_POST['query']);
    setcookie('search_result',serialize($search_result), time()+60, "/");
    header('Location: ../catalogue.php');
}
else{
    header('Location: ../catalogue.php');
}
?>