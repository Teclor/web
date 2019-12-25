<?php
require_once "configs\autoload.php";
require_once "functions\check_functions.php";
require_once "functions\get_history.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>

    <title>История заказов</title>
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
            <h1 class="jumbotron-heading" style="color:#008080;">История заказов</h1>

        </div>
    </section>
    <?php cabinet_nav(); ?>
    <section class="jumbotron text-center">
        <div class="container">
                <?php display_history(); ?>
        </div>
        <a href="cabinet.php" class="btn btn-primary" style="float: right;" type="button">Назад</a>
    </section>
</main>
<footer class="container">
    <p>© Kir & Tec</p>
</footer>
<script src="js/feedback_validator.js"></script>
</body></html>