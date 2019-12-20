<?php
function display($categories,$num_of_categories,$n,$bookinfo)
{
    $categories_found = search_categories($n, $bookinfo);
    search_message();
    for ($i = 0; $i < $num_of_categories; ++$i) {
        if (in_array($categories[$i][0], $categories_found)) {
            echo '
	      <div>
	      	<p>
	      		<h3 style="text-align: center; color:#008080";>' . $categories[$i][0] . '</h3>
	      	</p>
	      </div>
                <div class="row">
                    ';
            display_inner($categories[$i][0], $n, $bookinfo);
            echo '</div>';
        }
    }
}
function display_inner($sectionid,$n,$bookinfo)
{
    $i = 0;
    while ($i < $n) {
        if ($bookinfo[$i]['category'] == $sectionid) {
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
function search_message(){
    if(isset($_COOKIE['search_result'])){
        $search_result=unserialize($_COOKIE['search_result']);
        echo'	      
	      <div>
	      	<p>
	      		<h3 style="text-align: center;">'.$search_result['msg'].' </h3>
	      	</p>
	      </div>
';
        }
}



function search_categories($n,$bookinfo){
    $result=(array());
    for($i=0; $i<$n;++$i){
        $result[$i]=$bookinfo[$i]['category'];
    }
    return $result;
}
?>

