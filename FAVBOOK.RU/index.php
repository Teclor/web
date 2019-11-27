<?php
require_once "configs\autoload.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>
    <title>"Любимая книжка"</title>
</head>

  <body>
  <?php
      navbar();
  ?>
<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3" style="text-align: center;" >Привет, посетитель!</h1>
      <p style="text-align: center;" >Мы предлагаем сервис по онлайн покупке книг. </p>
      <p style="text-align: center;" >Ассортимент наших книг крайне велик, так что смело жми кнопочку "каталог" :)</p>
      <p style="text-align: center;"><a class="btn btn-primary btn-lg" href="catalogue.php" role="button">Просмотреть каталог</a></p>
    </div>
  </div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <a href="catalogue.php">
    <div class="carousel-item active">
      <img src="media\Slide1.jpg" class="d-block w-100" alt="...">
    </div> 
    <div class="carousel-item">
      <img src="media\Slide2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</a>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2 style="text-align: center">Демидович</h2>
        <p><img src="media\dem.jpg" alt="Демидович"></p>
        <p style="text-align: center"> Нет нерешаемых уравнений </p>
        <p style="text-align: center"><a class="btn btn-secondary" href="#" role="button">Купить »</a></p>
      </div>
      <div class="col-md-4">
        <h2 style="text-align: center">Демидович</h2>
        <p><img src="media\dem.jpg" alt="Демидович"></p>
        <p style="text-align: center"> Есть </p>
        <p style="text-align: center"><a class="btn btn-secondary" href="#" role="button">Купить »</a></p>
      </div>
      <div class="col-md-4">
        <h2 style="text-align: center">Демидович</h2>
        <p><img src="media\dem.jpg" alt="Демидович"></p>
        <p style="text-align: center">Нерешительные студенты</p>
        <p style="text-align: center"><a class="btn btn-secondary" href="#" role="button">Купить »</a></p>
      </div>
    </div>
    <hr>
  </div>
</main>

<footer class="container">
  <p>© Kir & Tec</p>
</footer>
</body></html>