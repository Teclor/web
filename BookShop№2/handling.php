<?php
	require "configs\connectdb.php";
	$login=$_POST['login'];
	$password=$_POST['password'];
	$password = md5($password);

	function generateCode($length=6) {
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
   	 	$code = "";
    	$clen = strlen($chars) - 1;  
    	while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    	}
    	return $code;
	}
?>
	
	<!DOCTYPE html>
    <html lang="ru"><head>  <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Личный кабинет</title>

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
    <div  class="container">
            <?php
            	$checklogin = mysqli_query($connection,"SELECT `login` FROM `users` WHERE `login` = '$login'");
            	if (mysqli_num_rows($checklogin) == 0){
					echo '<h1>Вы не зарегистрированы. Данный логин отсутствует в системе.</h1>';
					echo '
                	<div class="btn-group">
                    	<a href="authorization.php" class="btn btn-primary btn-lg" role="button">
                        	Назад
                   	 	</a>
                	</div>';
					exit();
				}
				$checkconnect = mysqli_query($connection,"SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
				if (mysqli_num_rows($checkconnect) == 0){
					echo '<h1>Неправильный пароль. Попробуйте ещё раз.</h1>';
					echo '
                	<div class="btn-group">
                    	<a href="authorization.php" class="btn btn-primary btn-lg" role="button">
                        	Назад
                   	 	</a>
                	</div>';
					exit();
				}
				//$hash = md5(generateCode(10));

				$data = $checkconnect -> fetch_assoc();
				//mysqli_query($connection, "UPDATE users_info SET user_hash='".$hash."' WHERE user_id='".$data['id']."'");

				setcookie('id', $data['id'], time()+3600, "/");
				//setcookie('hash', $hash, time()+3600);
				header('Location: cabinet.php');
            ?>
        </section>
    </body></html>

