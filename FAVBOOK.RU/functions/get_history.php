<?php
require_once "configs\db_pdo.php";
require_once "check_functions.php";
user_check();


function display_history(){
    user_check();
    $user_id=$_SESSION['user'];
    $sql="SELECT * FROM `orders` WHERE `user_id`='$user_id'";
    $result=DB::query($sql);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row;
    }
    if(isset($res))
    {

        $i=0;
        while(isset($res[$i])) {
                echo '
                        <div class="card">
                          <h5 class="card-header">Заказ номер '.$res[$i]['id'].'</h5>
                          <div class="card-body">
                            <h5 class="card-title">Статус заказа: '.$res[$i]['status'].'</h5>
                            <p class="card-text">Дата заказа: '.$res[$i]['order_date'].'</p>
                            <p class="card-text">Дата доставки: '.$res[$i]['delivery_date'].'</p>
                            ';
                if($res[$i]['status']=='На складе') echo '<form action="handlers\order_cancel.php" method="POST"><input style="display:none" name="order_id"  value="'.$res[$i]['id'].'"><button class="btn btn-primary" type="submit">Отменить заказ</button></form>';
                echo'
                          </div>
                        </div>
                    ';
            $i++;
        }
    }
    else{echo'<h4 >Список пуст.</h4>';}

}

?>