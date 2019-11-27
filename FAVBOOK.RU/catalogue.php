<!DOCTYPE html>
<?php
require_once "configs\autoload.php";
require_once "functions\getcat.php";
require_once "functions\catfunc.php";
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
</main>
  <footer class="container">
      <p>© Kir & Tec</p>
  </footer>
  </body></html>