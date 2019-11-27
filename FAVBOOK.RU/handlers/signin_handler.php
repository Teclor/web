<?php
require "..\configs\autoload.php";
require "..\configs\db.php";
$login=$_POST['login'];
$password=$_POST['password'];
$password = md5($password);
?>
    <!DOCTYPE html>
    <html lang="ru"><head>
    <?php
    head_changedir();
    ?>
    <title>Личный кабинет</title>
    </head>
    <body>
    <?php
        require_once "..\includes\\navbar_changedir.html";
    ?>
    <main role="main" class="container">
        <section class="jumbotron text-center">
    <div  class="container">
            <?php
            if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['password']) or !preg_match("/^[a-zA-Z0-9]+$/",$login))
            {
                echo '<h1>В логине и пароле могут быть использованы только цифры и буквы латинского алфавита!</h1>';
                echo '
                <div class="btn-group">
                    <a href="..\signin.php" class="btn btn-primary btn-lg" role="button">
                        Назад
                    </a>
                </div>';
                exit();
            }
            $checklogin = mysqli_query($connection,"SELECT `login` FROM `passinfo` WHERE `login` = '$login'");
            if(mysqli_num_rows($checklogin)==0){
                echo '<h1>Такого логина нет в системе!</h1>';
                echo '
                <div class="btn-group">
                    <a href="..\signin.php" class="btn btn-primary btn-lg" role="button">
                        Назад
                    </a>
                </div>';
                exit();
            }
            $result = mysqli_query($connection, "SELECT * FROM `passinfo` WHERE `login` = '$login' AND `password` = '$password'");
            if(mysqli_num_rows($result)==0)
            {
                echo '<h1>Неправильный пароль!</h1>';
                echo '
                <div class="btn-group">
                    <a href="..\signin.php" class="btn btn-primary btn-lg" role="button">
                        Назад
                    </a>
                </div>';
                exit();
            }

            $user=$result->fetch_assoc();
            session_start();
            $_SESSION['user'] = $user['id'];
            header('Location: ..\cabinet.php');
            ?>
        </section>

    </main><!-- /.container -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

    </body></html>
