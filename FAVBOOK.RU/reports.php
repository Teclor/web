<?php
require_once "functions\check_functions.php";
admin_check();
require_once "configs\autoload.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>
    <title>"Редактирование каталога"</title>
</head>

<body>
<?php
navbar();
?>
<div role="main" class="container">

    <section class="jumbotron text-center">
        <div class="container">
            <h2 class="jumbotron-heading" style="color:#008080"; >Редактор каталога книг.</h2>
            <p class="lead text-muted">Здесь вы можете добавлять новые книги в БД.</p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <form action="handlers\get_report.php" method="POST" id="form" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col">

                        <select class="form-control" name="report_type">
                            <option>Статистика по заказам за последний месяц</option>
                            <option>Топ заказчиков за последний месяц</option>
                            <option>Статистика заказанных книг по жанру</option>
                            <option>Отчет об эффективности скидок</option>
                            <option>Статистика пунктов выдачи</option>
                            <option>Статистика обратной связи по дням</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Сформировать отчёт</button>
                </div>
        </form>
    </div>
    <div class="container">
        <?php if(isset($_COOKIE['report'])){
            echo $_COOKIE['report'];
            //setcookie('report','deleting',time()-60,"/");
        } ?>
    </div>
</div>

</main>
</body></html>