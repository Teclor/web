<?php
require_once "..\configs\db_pdo.php";
if(isset($_POST['login_exists'])) {
    //моментальная проверка через ajax на совпадение логина из бд
    require_once "..\configs\db_pdo.php";
    $query = "SELECT `login` FROM `passinfo`";
    $res= DB::query($query);
    $result=array();
    while($row=$res->fetch(PDO::FETCH_NUM))
    {
        $result[]=$row[0];
    }
    $login=$_POST['login_exists'];
    echo in_array($login,$result);
}

if(!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['address']) || !$_FILES){
    $error = 'Вы заполнили не все поля формы регистрации!';
    $registration_success =false;
}
    else {
        //на случай отключенного js проверка существующего логина (ну и остальное)
        $query = "SELECT `login` FROM `passinfo`";
        $res = DB::query($query);
        $result = array();
        while ($row = $res->fetch(PDO::FETCH_NUM)) {
            $result[] = $row[0];
        }
        $login = $_POST['login'];
        if (in_array($login, $result)) {
            $registration_success = false;
            $error = 'Такой логин уже есть в системе!';
            error_exit($error);
        }
    //проверяем и вставляем в БД данные из полей регистрации
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if (!preg_match("/^[a-zA-Z0-9]/", $login))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле логин!';
            error_exit($error);
        }
        if (!preg_match("/^[a-zA-Z0-9]/", $password))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле пароль!';
            error_exit($error);
        }
        if (!preg_match("/^[a-zA-ZА-Яа-я\s]/", $name))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле имя!';
            error_exit($error);
        }
        if (!preg_match("/[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}/", $email))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле email!';
            error_exit($error);
        }
        if (!preg_match("/^[0-9a-zA-ZА-Яа-я_\.\,\"\+\-\s]/", $address))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле адрес!';
            error_exit($error);
        }
        if (!preg_match("/^[0-9\+\-]/", $phone))
        {
            $registration_success = false;
            $error = 'Неправильно заполнено поле телефон!';
            error_exit($error);
        }

        else {
            $allowed =  array('gif' ,'jpg');
            $filename = $_FILES["filename"]["name"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) || $_FILES['filename']['error'] != 0 ) {
                $error='Неверный формат или повреждённое изображение!';
                error_exit($error);
            }
            else {
                move_uploaded_file
                (
                    $_FILES["filename"]["tmp_name"],
                    ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"]
                );
                $filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "books_images" . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"];
                $imagename = $_FILES["filename"]["name"];
                $width = 512;
                $height = 512;
                list($width_orig, $height_orig) = getimagesize($filename);

                $image_p = imagecreatetruecolor($width, $height);
                $image = imagecreatefromjpeg($filename);
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagejpeg($image_p, $filename, 100);
            }
            $password=md5($password);
            $query = "INSERT INTO `passinfo` (`login`, `password`) VALUES ('$login','$password')";
            $prepared_query=DB::prepare($query);
            $prepared_query->execute();
            $id=DB::lastInsertId();
            $query = "INSERT INTO `privateinfo` (`user_id`, `name`, `email`, `phone`,`address`,`avatar` ) VALUES ('$id','$name','$email','$phone','$address','$imagename')";
            $prepared_query=DB::prepare($query);
            $prepared_query->execute();
            $id=DB::lastInsertId();
            $new_filename = ".." . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "profile_pics" . DIRECTORY_SEPARATOR . $id.".jpg";
            rename ( $filename , $new_filename);
            $imagename = $id.".jpg";
            $query="UPDATE `privateinfo` SET `avatar`='$imagename' WHERE `id`= '$id'";
            $prepared_query=DB::prepare($query);
            $prepared_query->execute();
            $registration_success=true;
            $error='No error';
        }
}

//проверка работоспособности js на клиенте и варианты результирующих действий
if(!isset($_POST['ajax_active'])){
    if(isset($registration_success)){
        if($registration_success){ setcookie("success", 'Регистрация успешно завершена!', time()+60,"/");header("Location: default_error_handler.php");}
        else{
            error_exit($error);
        }
    }
    else{
        error_exit($error);
    }
}

function error_exit($error){
    setcookie("error", $error, time()+60,"/");
    header("Location: default_error_handler.php");
    exit();
}

