<?php
require_once "functions\check_functions.php";
    user_admin_and_book();
    require_once "configs\autoload.php";
    require_once "configs\db.php";
    $id = $_COOKIE['bookid'];
    $query = mysqli_query($connection, "SELECT * FROM `bookinfo` WHERE `id` ='$id'");
    $book = $query->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    default_head();
    ?>
    <title>"Редактирование книги"</title>
</head>
<body>
<?php
navbar();
?>
<main>
<div role="main" class="container">

    <section class="jumbotron text-center">
        <div class="container">
            <h2 class="jumbotron-heading" style="color:#008080"; >Редактор каталога книг.</h2>
            <p class="lead text-muted">Здесь вы можете обновить информацию о книге в бд или удалить книгу.</p>
        </div>
    </section>

    <div class="album py-5 bg-light"><h4 style="color: #6f42c1; text-align: center;"><span id="alert" ></span></h4>
        <form action="handlers\udhandler.php" method="POST" id="form" enctype="multipart/form-data">
        <div class="container">

                <div class="row">
                    <div class="col">

                        <select class="form-control" name="category" value="<?php echo $book['category'];?>">
                            <option>Российская художественная литература</option>
                            <option>Зарубежная художественная литература</option>
                            <option>Учебная литература</option>
                            <option>Научная литература</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Название" name="bookname" id="bookname" value="<?php echo $book['bookname'];?>">
                    </div>
                </div>
        <p></p>

        </div>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Цена" name="price" id="price" value="<?php echo $book['price'];?>">
                        <input type="checkbox" name="discount"> Цена по скидке.
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Год публикации" name="year" id="year" value="<?php echo $book['pubdate'];?>">
                    </div>
                </div>
        </div>
            <div class="form-group" style="margin: 17px">
                <textarea placeholder="Описание книги" class="form-control" id="description" name ="descr" rows="3"><?php echo $book['description'];?></textarea>
            </div>
            <p></p>
            <div style="text-align: center">
                <h4>Загрузить фото книги</h4>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                <input type="file" name="filename"><br>
            </div>
            <input style="display:none;" type="text" value="<?php echo $book['id'];?>" name="id">
            <input style="display:none;" type="text" value="<?php echo $book['image'];?>" name="img">
        <div class="album py-5 bg-light" >
            <p style="text-align: center">
                <button class="btn btn-lg btn-success" type="submit" id="send-form">Сохранить изменения</button>
            </p>
        </div>
    </form>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js\ud_ajax.js"></script>
        <div style="text-align: center;" >
            <a href="handlers\delbook.php"><button type="button" class="btn btn-secondary btn-lg">Удалить</button></a>
        </div>
    </div>
</div>
</main>

<footer class="container">
    <p>© Kir & Tec</p>
</footer>
</body></html>




