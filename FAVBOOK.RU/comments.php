<?php
    require_once "functions\check_functions.php";
    book_check();
    require_once "configs\autoload.php";
    require_once "configs\db.php";
    require_once "functions\commdisplay.php";
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
    <title>"Комментарии"</title>
</head>
<body>
<?php
navbar();
?>
    <main role="main" class="container">
        <?php

        if(isset($_SESSION['user']))
            echo'
    <form method="post" action="handlers\commentshandler.php" id="form">
    <div class="form-group" style="margin-top: 100px">
        <textarea placeholder="Введите комментарий" class="form-control" id="description" name ="descr" rows="3"></textarea>
    </div>
    <div style="text-align: center">
         <button  type="submit" class="btn btn-lg btn-success" id="send-form">Добавить комментарий</button>
        </div>
    </form>
    ';
        ?>
    <div class="container">
        <?php display($id,$connection); ?>
    </div>

    <div style="float: left; width: 100px.; margin-top: 60px;">
        <a href="bookpage.php" class="btn btn-secondary btn-lg" role="button">
            Назад к книге.
        </a>
    </div>
    <script src="js\comment_validator.js">
    </script>
</main>

</body></html>