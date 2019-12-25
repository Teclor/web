<!DOCTYPE html>
<?php
require_once "configs\autoload.php";
require_once "functions\getcat.php";
require_once "functions\get_sales.php";
?>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>
    <title>Акции и скидки</title>

</head>
<body>
<?php
navbar();
?>

<main role="main" class="container">

    <section class="jumbotron text-center">
        <div class="container">
            <h2 class="jumbotron-heading" style="color:#008080"; >Ниже представлены книги со скидкой</h2>
        </div>
    </section>
    <div class="album py-5 bg-light" style="margin-top: 20px">

        <div class="container">
            <div class="row">
            <?php
            display_sales($n,$bookinfo);
            ?>
            </div>
        </div>
    </div>
</main>
<footer class="container">
    <p>© Kir & Tec</p>
</footer>
</body></html>