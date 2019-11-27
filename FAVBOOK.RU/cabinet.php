<?php
    require_once "configs\autoload.php";
    require_once "configs\db.php";
    require_once "functions\check_functions.php"
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php
        default_head();
        ?>
        <title>Личный кабинет</title>
    </head>
  <body>
  <?php
        user_check();
  ?>
  <?php
  navbar();
  ?>

<main role="main" class="container">
    <?php
        require "functions\getuserinfo.php";
    ?>
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading" style="color:#008080;">Личный кабинет</h1>

    </div>
  </section>

<div class="btn-group">
    <a href="cabinet.php" class="btn btn-secondary active" role="button">
        Профиль
    </a>
    <a href="#" class="btn btn-secondary">История заказов</a>
    <a href="#" class="btn btn-secondary">Настройки</a>
    <a href="handlers\exit.php" class="btn btn-primary">Выйти</a>
    <?php
    if($_SESSION['user'] == '1') {
        echo '
            <a href="admincr.php" class="btn btn-success">Редактировать каталог</a>
            ';
    }
    ?>
</div>

  <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $userinfo['avatar']; ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $userinfo['name']; ?></h5>
        <p class="card-text">Статус: <?php echo $userinfo['status']; ?> </p>
        <p class="card-text"><small class="text-muted">Книг куплено: <?php echo $userinfo['bought']; ?> </small></p>
      </div>
    </div>
  </div>
</div>
<div class="card bg-dark text-white">
  <img src="media\books.jpg" class="card-img" alt="...">
  <div class="card-img-overlay" style="text-align: right;">
    <h5 class="card-title" style="color: #FFE4C4;">Персональная информация </h5>
    <p class="card-text" style="color: #FFF8DC;">Мобильный телефон: <?php echo $userinfo['phone']; ?></p>
    <p class="card-text" style="color: #FFF8DC;">Почта: <?php echo $userinfo['email']; ?></p>
        <p class="card-text" style="color: #FFF8DC;">Адрес доставки: <?php echo $userinfo['address']; ?></p>
  </div>
</div>

</main>
  <footer class="container">
      <p>© Kir & Tec</p>
  </footer>
  </body></html>