<!DOCTYPE html>
<html lang="ru">
<head>   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>"Любимая книжка"</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js" nonce="DEDF73F1EF7F1E4E8FF77238F66B469D" charset="UTF-8"></script><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php" style="color:#ADFF2F;">Магазин "Любимая Книжка"</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="catalogue.php">Каталог</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cabinet.php">Личный кабинет</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать</button>
    </form>
  </div>
</nav>

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body></html>