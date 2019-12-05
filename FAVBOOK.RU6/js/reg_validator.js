type = "text/javascript"
    /* Функция, создающая экземпляр XMLHTTP */

function checkLogin_exists(login) {
    let xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'handlers\\signup_handler.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем тип содержимого
    xmlhttp.send("login_exists=" + encodeURIComponent(login)+"&ajax_active=true"); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function () { // Ждём ответа от сервера
        if (xmlhttp.readyState == 4) { // Ответ пришёл
            if (xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
                console.log(xmlhttp.responseText);
                if (xmlhttp.responseText) document.getElementById("check_login_exists").innerHTML = "Логин занят!";
                else document.getElementById("check_login_exists").innerHTML = "Логин свободен!";
            }
        }
    };
}
document.getElementById('send').addEventListener('click',validate,false);

function validate(event) {
    document.getElementById('form')
    let fail = null;
    let login = form.user_login.value;
    let password = form.user_password.value;
    let name = form.user_name.value;
    let email=form.user_email.value;
    let phone = form.user_phone.value;
    let address = form.user_address.value;

    let login_and_password= /[a-zA-Z0-9]/;
    let addresscheck = /[0-9a-zA-ZА-Яа-я_\.\,\"\+\-\s]/;
    let namecheck = /[a-zA-ZА-Яа-я\s]/;
    let emailcheck=/[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}/;
    let phonecheck=/[0-9\+\-]/;

    if (login== "" || login== " " || login.match(login_and_password) == null || login.length > 12 || login.length < 3)
        fail = "В логине должны быть только буквы латинского алфавита, цифры! Не короче 3 и не длиннее 12 символов.";
    else if (password== "" || login== " " || login.match(login_and_password) == null || password.length > 30 || password.length < 6)
        fail = "В пароле должны быть только буквы латинского алфавита, цифры! Не короче 6 и не длиннее 30 символов.";
    else if (name== "" || name== " " || name.match(namecheck) == null || name.length > 20 || name.length < 2)
        fail = "В поле имя должны быть только буквы рус. и лат. алфавита, цифры! Не короче 2 и не длиннее 20 символов.";
    else if (email== "" || email== " " || email.match(emailcheck) == null)
        fail = "Проверьте на корректность e-mail";
    else if (phone== "" || phone== " " || phone.match(phonecheck) == null || phone.length > 20 || phone.length < 8)
        fail = "Проверьте на корректность телефон";
    else if (address== "" || address== " " || address.match(addresscheck) == null || address.length > 200 || address.length < 1)
        fail = "Адрес должен быть заполнен и не длиннее 200 символов и не содержать специсимволов";

    if (!fail) fail=check(login,login_and_password,"логин!");
    if (!fail) fail=check(password,login_and_password,"пароль!");
    if (!fail) fail=check(name,namecheck,"имя!");
    if (!fail) fail=check(phone,phonecheck,"телефон!");
    if (!fail) fail=check(address,addresscheck,"адрес!");
    if (fail) {
        document.getElementById("alert").innerHTML = fail;
        event.preventDefault();
    }
}
function check(obj,reg,str){
    for(let i =0; i<obj.length; i++){
        if(!reg.test(obj.charAt(i))){return "Вы неверно заполнили поле " + str;}
    }
    return null;
}