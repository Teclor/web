<?php
require_once "configs\db_pdo.php";
require_once "check_functions.php";


function display_cart(){
    user_check();
    $user_id=$_SESSION['user'];
    $sql="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
    $result=DB::query($sql);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row;
    }
    if(isset($res))
        {

            $i=0;
            while(isset($res[$i])) {
                $sql="SELECT `price`,`bookname` FROM `bookinfo` WHERE `id`={$res[$i]['book_id']}";
                $book=DB::query($sql);

                $book=$book->fetch(PDO::FETCH_ASSOC);
                if($book){
                        echo '
                                <div class="card w-25" >
                                  <div class="card-body">
                                    <h5 class="card-title">'.$book['price'].' рублей</h5>
                                    <p class="card-text">'.$book['bookname'].'</p>
                                    
                                  </div>
                                  <form method="post" action="functions/delete_from_cart.php"> <input name="bookid" style="display: none" value="'.$res[$i]['book_id'].'">
                                  <button class="btn btn-secondary" style="width: 260px" type="submit">Удалить из корзины</button> </form>
                                </div>
                    ';
                }
                else{echo'<h4 >Корзина пуста.</h4>'; break;}
                $i++;
            }
            echo'<a href="handlers\order.php" class="btn btn-primary" style="margin-top: 100px;" type="button">Оформить заказ</a>';
        }
    else{echo'<h4 >Корзина пуста.</h4>';}

}

?>