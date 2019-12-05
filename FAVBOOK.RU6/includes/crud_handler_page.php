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
        <h3>Запись успешно добавлена в базу данных!</h3>
    </div>
    <div class="container">
        <div class="btn-group">
            <a href="..\catalogue.php" class="btn btn-primary btn-lg" role="button">
            В каталог
            </a>
        </div>
    </div>
    </section>
</main>

<footer class="container">
    <p>© Kir & Tec</p>
</footer>
</body></html>