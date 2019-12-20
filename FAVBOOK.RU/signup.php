<?php
require_once "configs\autoload.php";
require_once "configs\db_pdo.php";
if(isset($_SESSION['user'])) {header('Location: cabinet.php'); exit(1);}
?>
<!DOCTYPE html>
<html lang="en"><head>
    <?php
    default_head();
    ?>
    <link href="./signin_files/signin.css" rel="stylesheet">
    <link href="./signin_files/css" rel="stylesheet">
    <title>Регистрация</title>

</head>

<body class="text-center">
<?php
navbar();
?>
<main class="container">
<div style="text-align: center; height: 840px;" class="jumbotron">
    <form action="handlers\signup_handler.php" method="POST" id="form" enctype="multipart/form-data">
    <div class="container" style="margin-top: 20px;">
        <span style="color: #6f42c1" id="alert"></span>
            <h4>Логин</h4>
            <div class="col">
                <input style="margin-left: 340px; width: 300px" type="text" class="form-control" placeholder="Введите логин" name="login" id="user_login" onblur="checkLogin_exists(this.value)"> <span style="color: #6f42c1" id="check_login_exists"></span><span style="color: #6f42c1" id="check_login"></span>
            </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <h4>Пароль</h4>
        <div class="col">
            <input style="margin-left: 340px; width: 300px" type="password" class="form-control" placeholder="Введите пароль" name="password" id="user_password" >
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <h4>Имя</h4>
        <div class="col">
            <input style="margin-left: 240px; width: 500px"type="text" class="form-control" placeholder="Введите своё имя" name="name" id="user_name">
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <h4>E-mail</h4>
        <div class="col">
            <input style="margin-left: 240px; width: 500px" type="text" class="form-control" placeholder="Введите e-mail" name="email" id="user_email">
        </div>
    </div>

    <div class="container" style="margin-top: 20px">
        <h4>Телефон для связи</h4>
        <div class="col">
            <input style="margin-left: 240px; width: 500px" type="text" class="form-control" placeholder="Введите телефон" name="phone" id="user_phone">
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <h4>Предполагаемый адрес доставки</h4>
        <div class="col">
            <input type="text" class="form-control" placeholder="Введите адрес доставки" name="address" id="user_address">
        </div>
    </div>
    <div style="text-align: center; margin-top: 20px">
        <h4>Загрузите фото профиля (только jpeg, jpg)</h4>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="file" name="filename"><br>
    </div>
        <p style="text-align: center; margin-top: 30px;">
            <button class="btn btn-lg btn-success" type="submit" id="send">Зарегестрироваться</button>
        </p>
    </form>

<div>
</main>
<script src="js\reg_validator.js"></script>
<script src="js\getXmlHttp.js"></script>
</body></html>