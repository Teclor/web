document.getElementById('send-form').addEventListener('click',validate,false);
function validate(event) {
    document.getElementById('form')
    var fail = false;
    var description=form.description.value;
    let namecheck = /[0-9a-zA-ZА-Яа-я_@\?\!\.\,\"\+\-\s]/;
    if(description =="" || description == " " || description.match(namecheck) == null || description.length >500)
        fail = "Вы ввели неверное значение в поле комментарий!";
    else if (!fail) fail=check(description,namecheck,"комментарий!");
    if (fail) {
        alert(fail);
        event.preventDefault();
    }

}
function check(obj,reg,str){
    for(var i =0; i<obj.length; i++){
        if(!reg.test(obj.charAt(i))){return "Вы неверно заполнили поле " + str;}
    }
    return false;
}