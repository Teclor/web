<?php
require_once "configs\autoload.php";
require_once "functions\check_functions.php";
require_once "functions\get_cart.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>

    <title>Корзина</title>
</head>
<body>
<?php
user_check();
?>
<?php
navbar();
?>

<main role="main" class="container">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading" style="color:#008080;">Корзина</h1>

        </div>
    </section>
    <?php cabinet_nav(); ?>
    <section class="jumbotron text-center">
        <div class="container" style="height: 500px;">
            <div class="row">
                <?php display_cart(); ?>
            </div>
        </div>
    </section>
</main>
<footer class="container">
    <p>© Kir & Tec</p>
</footer>
<script src="js/feedback_validator.js"></script>
</body></html>