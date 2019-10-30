<?php

function display($sectionid,$n,$bookinfo)
{
    $i = 0;
    while ($i < $n) {
        if ($bookinfo[$i]['category'] == $sectionid) {
            echo '
                    <div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
                                <img src="media\bookimg.jpg" class="card-img-top" alt="No image">
                                       <div class="card-body">
                                           <p class="card-text">
                                                ' . $bookinfo[$i]['bookname'] . '
                                                <span class="badge badge-pill badge-info">Цена ' . $bookinfo[$i]['price'] . ' руб</span>                   
                                           </p>
                                               <div class="d-flex justify-content-between align-items-center">
                                                   <div class="btn-group">
                                                          <button type="button" class="btn btn-sm btn-outline-secondary">Перейти на страницу книги</button>
                                                          <button type="button" class="btn btn-sm btn-outline-secondary">В корзину</button>
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
?>