type = "text/javascript"
document.getElementById('send').addEventListener('click',validate,false);

function validate(event) {
    document.getElementById('form')
    let fail = null;
    let text = form.message.value;

    let textcheck = /[0-9a-zA-ZА-Яа-я_\.\,\"\+\-\s]/;

    if (text== "" || text== " " || text.match(textcheck) == null || text.length > 10000)
        fail = "Отзыв не должен содержать спецсимволов или быть пустым.";

    if (!fail) fail=check(text,textcheck,"сообщение!");
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