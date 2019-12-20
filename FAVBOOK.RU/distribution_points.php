<?php
require_once "configs\autoload.php";
require_once "functions\get_distrib.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>

    <title>Пункты выдачи</title>
</head>
<body>
<?php
navbar();
?>

<main role="main" class="container">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading" style="color:#008080;">Наши пункты выдачи</h1>

        </div>
    </section>
    <section class="jumbotron text-center">
        <div class="container">
                <?php display_distrib(); ?>
        </div>
        <a href="catalogue.php" class="btn btn-primary" style="float: right;" type="button">В каталог</a>
    </section>
</main>
<footer class="container">
    <p>© Kir & Tec</p>
</footer>
<script src="js/feedback_validator.js"></script>
</body></html>