<?php
require_once "functions\check_functions.php";
    book_check();
    require_once "configs\db.php";
    require_once "configs\autoload.php";
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
    <title>Книга</title>
</head>
<body>
    <?php
    navbar();
    ?>
<main role="main" class="container">


    <div style="margin-top: 120px; background-color:#F8F8FF;">
    <H1 style="margin-left: 50px"><?php echo $book['bookname'];?></H1>
    </div>
    <section class="jumbotron text-center" style="height: 500px">
        <div class="container" style="height: 300px">
            <div class="card" style=" float: left; width: 300px">
                <img src="media\books_images\<?php echo $book['image'];?>" class="card-img-top" alt="...">
            </div>
            <div style=" float: right; width: 650px">
            <h3 class="jumbotron-heading" >Краткое описание:</h3>
                <div style="text-align: left">
                    <?php echo $book['description'];?>

                    </div>
            </div>
        </div>
        <div style="margin-top: 33px;text-align: left; margin-right: 500px; float: right; width: 150px">
            <p><h4 style="color:#0000CD">Цена: <?php echo $book['price'];?> руб</h4></p>
        </div>
        <div style="float: left; width: 300px; margin-top: 30px; margin-left: 15px">
            <form method="post" action="functions\add_to_cart.php"> <input name="book_id" style="display: none" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Добавить в корзину</button> </form>
        </div>
    </section>
    <div class="btn-group btn-group-toggle">
        <div style="float: left; width: 200px.">
            <a href="catalogue.php" class="btn btn-secondary btn-lg" role="button">
                Назад к каталогу
            </a>
        </div>
        <div style="text-align: center; margin-left: 295px;width: 150px"  >
            <form method="post "action="comments.php">
                <input name="bookid" style="display: none" value="<?php echo $id;?>">
                <button type="submit" class="btn btn-secondary btn-lg">Комментарии</button>
            </form>
        </div>
    <?php
    if(isset($_SESSION['user']))
        if ($_SESSION['user'] == 1)
            echo '

        <div style="text-align: right; margin-left: 170px"  >
            <a href="adminud.php"><button type="button" class="btn btn-secondary btn-lg">Редактировать</button></a>
        </div>
        <div style="text-align: right; margin-left: 30px;"  >
            <a href="handlers\delbook.php"><button type="button" class="btn btn-secondary btn-lg">Удалить</button></a>
        </div>
    ';


    ?>
</div>

</main>
</main>
</body></html>