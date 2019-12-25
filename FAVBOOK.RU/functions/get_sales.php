<?php
require_once "configs\db_pdo.php";
function display_sales($n,$bookinfo){
$i = 0;
    $query=DB::query("SELECT `book_id` FROM `sale`");
    while($row=$query->fetch(PDO::FETCH_NUM)) {
        $on_sale[] =$row[0];
        }
    while ($i < $n) {
    if (in_array($bookinfo[$i]['id'],$on_sale)) {
        echo '
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="media\books_images'.'\\'.$bookinfo[$i]['image'].'" class="card-img-top" alt="No image">
                <div class="card-body">
                    <p class="card-text">
                        ' . $bookinfo[$i]['bookname'] . '
                        <span class="badge badge-pill badge-info">Цена ' . $bookinfo[$i]['price'] . ' руб</span>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form method="post" action="functions\bookcookie.php"> <input name="bookid" style="display: none" value="'.$bookinfo[$i]['id'].'"><button type="submit" class="btn btn-sm btn-outline-secondary">Перейти на страницу книги</button></form>
                            <form method="post" action="functions\add_to_cart.php"> <input name="book_id" style="display: none" value="'.$bookinfo[$i]['id'].'"><button type="submit" class="btn btn-sm btn-outline-secondary">В корзину</button></form>
                        </div>
        
                        <small class="text-muted" style="text-align: center;">Дата публикации: ' . $bookinfo[$i]['pubdate'] . ' год</small>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    ++$i;
    }
}