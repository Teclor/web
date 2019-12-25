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
<h4 style="color: #6f42c1; text-align: center;"><span id="alert" ></span></h4>
    <div class="album py-5 bg-light">
        <form action="handlers\crhandler.php" method="POST" id="form" enctype="multipart/form-data">
        <div class="container">

                <div class="row">
                    <div class="col">

                        <select class="form-control" name="category">
                            <option>Российская художественная литература</option>
                            <option>Зарубежная художественная литература</option>
                            <option>Учебная литература</option>
                            <option>Научная литература</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Название" name="bookname" id="bookname">
                    </div>
                </div>
        <p></p>

        </div>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Цена" name="price" id="price">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Год публикации" name="year" id="year">
                    </div>
                </div>
        </div>
            <div class="form-group" style="margin: 17px">
                <textarea placeholder="Описание книги" class="form-control" id="description" name ="descr" rows="3"></textarea>
            </div>
            <p></p>
            <div style="text-align: center">
                <h4>Загрузить фото книги</h4>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                <input type="file" name="filename"><br>
            </div>
        <div class="album py-5 bg-light" >
            <p style="text-align: center">
                <button class="btn btn-lg btn-success" type="submit" id="send-form">Добавить книгу</button>
            </p>
        </div>
    </form>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js\cr_ajax.js"></script>
    </div>
</div>

</main>
</body></html>




