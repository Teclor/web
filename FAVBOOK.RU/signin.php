<?php
require_once "configs\autoload.php";
require "configs\db.php";
?>
<!DOCTYPE html>
<html lang="en"><head>
    <?php
    default_head();
    ?>
    <link href="./signin_files/signin.css" rel="stylesheet">
  <link href="./signin_files/css" rel="stylesheet">
    <title>Вход в личный кабинет</title>
</head>

<span id="warning-container"><i data-reactroot=""></i></span>
  <body class="text-center">
  <?php
  navbar();
  ?>
  <form method="POST" action="handlers\signin_handler.php" class="form-signin">
      <img class="mb-4" src="#" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
      <input type="text" class="form-control" placeholder="Логин" required="" autofocus="" name="login" >
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" name="password">
    <!--  <div class="checkbox mb-3">
          <label>
              <input type="checkbox" value="remember-me"> Запомнить меня
          </label>
      </div>
     -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      <p class="mt-5 mb-3 text-muted">© Kir & Tec</p>
  </form>
</body></html>