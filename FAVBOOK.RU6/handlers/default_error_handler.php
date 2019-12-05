<?php
require_once "..\configs\autoload.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    head_changedir();
    ?>
    <title>"Любимая книжка"</title>
</head>

<body>
<?php
navbar_changedir();
?>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h3><?php if(isset($_COOKIE['error'])){echo 'Ошибка! '.$_COOKIE['error']; setcookie("error",'deleting',time()-60,"/");}
            elseif(isset($_COOKIE['success'])){echo $_COOKIE['success']; setcookie("success",'deleting',time()-60,"/");}
            else echo "Неизвестная ошибка!"?></h3>
        </div>
        <div class="container">
            <div class="btn-group">
                <a href="..\cabinet.php" class="btn btn-primary btn-lg" role="button">
                    В личный кабинет
                </a>
            </div>
        </div>
    </section>
</main>

<footer class="container">
    <p>© Kir & Tec</p>
</footer>
</body></html>