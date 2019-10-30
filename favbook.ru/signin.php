<?php
require "configs\db.php";
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Вход в личный кабинет</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="./signin_files/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
    <!-- Custom styles for this template -->
    <link href="./signin_files/signin.css" rel="stylesheet">
  <link href="./signin_files/css" rel="stylesheet"></head><span id="warning-container"><i data-reactroot=""></i></span>
  <body class="text-center">
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
  <form method="POST" action="handler.php" class="form-signin">
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
      <p class="mt-5 mb-3 text-muted">© 2019</p>
  </form>
</body></html>