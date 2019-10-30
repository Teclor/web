<!DOCTYPE html>
<?php

require "configs\getcat.php";
require "configs\catfunc.php";
?>
<html lang="ru"><head>  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Kir&Tec">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Каталог</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
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
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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

<main role="main" class="container">

  <section class="jumbotron text-center">
    <div class="container">
      <h2 class="jumbotron-heading" style="color:#008080"; >Каталог книг</h2>
      <p class="lead text-muted">Здесь вы можете просмотреть ассортимент книг и заказать понравившуюся.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Акции и скидки</a>
        <a href="#" class="btn btn-secondary my-2">Информация о доставке</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">

    <div class="container">


	      <div>
	      	<p>
	      		<h3 style="text-align: center";>Художественная литература</h3>
	      	</p>
	      </div>

	      <div>
	      	<p>
	      		<h5 style="text-align: center; color:#008080";>Российская художественная литература</h5>
	      	</p>
	      </div>
                <div class="row">
                    <?php
                        display('Российская художественная литература',$n,$bookinfo);
                    ?>
                </div>

	      <div>
	      	<p>
	      		<h5 style="text-align: center; color:#008080";>Зарубежная художественная литература</h5>
	      	</p>
	      </div>

        <div class="row">
            <?php
            display('Зарубежная художественная литература',$n,$bookinfo);
            ?>
        </div>

        <div>
	      	<p>
	      		<h3 style="text-align: center">Учебная литература</h3>
	      	</p>
	      </div>

        <div class="row">
            <?php
            display('Учебная литература',$n,$bookinfo);
            ?>
        </div>


      	  <div>
	      	<p>
	      		<h3 style="text-align: center">Научная литература</h3>
	      	</p>
	      </div>

        <div class="row">
            <?php
            display('Научная литература',$n,$bookinfo);
            ?>
        </div>



</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body></html>