<!DOCTYPE html>
<?php
require_once "configs\autoload.php";
require_once "functions\getcat.php";
require_once "functions\catfunc.php";
if(isset($_COOKIE['search_result'])){
$prepare_info=unserialize($_COOKIE['search_result']);
$bookinfo=$prepare_info['res'];
$n=$prepare_info['number'];
setcookie('search_result','deleting', time()-60, "/");
}
?>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>
    <title>Каталог</title>

  </head>
  <body>
  <?php
  navbar();
  ?>

<main role="main" class="container">

  <section class="jumbotron text-center">
    <div class="container">
      <h2 class="jumbotron-heading" style="color:#008080"; >Каталог книг</h2>
      <p class="lead text-muted">Здесь вы можете просмотреть ассортимент книг и заказать понравившуюся.</p>
      <p>
        <a href="#" style="width: 210px" class="btn btn-primary my-2">Акции и скидки</a>
        <a href="#" style="width: 210px" class="btn btn-secondary my-2">Информация о доставке</a>
      </p>
        <div style="margin-left: 255px" >
            <form method="POST" action="handlers\search_book.php" class="form-inline my-2 my-lg-0">
                <input name="query" style="width: 500px;" class="form-control mr-sm-2" type="text" placeholder="Поиск по каталогу" aria-label="Search">
                <button style="margin-left: 195px"class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти книгу</button>
            </form>
        </div>
    </div>
  </section>
    <div class="album py-5 bg-light" style="height: 10px; color: cadetblue;">
    <h5>Вам показаны книги доступные для доставки в ближайшие дни к вашему населенному пункту.
        Ваш населенный пункт: <?php
        require_once "functions\get_user_location.php";
        ?>.</h5><br/>  <h6>Вы можете изменить населённый пункт в настройках  в личном кабинете.</h6>
    </div>
  <div class="album py-5 bg-light" style="margin-top: 20px">

    <div class="container">
        <?php
                display($categories,$num_of_categories,$n,$bookinfo);
        ?>
    </div>
  </div>
</main>
  <footer class="container">
      <p>© Kir & Tec</p>
  </footer>
  </body></html>