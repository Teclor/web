<?php
require_once "configs\db_pdo.php";


function display_distrib(){
    $sql="SELECT * FROM `distribution_points`";
    $result=DB::query($sql);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row;
    }
    if(isset($res))
    {

        $i=0;
        while(isset($res[$i])) {
                echo '
                        <div class="card w-100">
                          <div class="card-body">
                            <h5 class="card-title">Название пункта выдачи: '.$res[$i]['point_name'].'</h5>
                            <p class="card-text">Адрес пункта выдачи: '.$res[$i]['address'].'</p>
                          </div>
                        </div>
                    ';
            $i++;
        }
    }
    else{echo'<h4 >Список пуст.</h4>';}

}

?>