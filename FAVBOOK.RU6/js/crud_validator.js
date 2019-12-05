document.getElementById('send-form').addEventListener('click',validate,false);
function validate(event) {
    document.getElementById('form')
    let fail = false;
    let bookname = form.bookname.value;
    let price = form.price.value;
    let year = form.year.value;
    let description=form.description.value;
    let namecheck = /[0-9a-zA-ZА-Яа-я_\.\,\"\+\-\s]/;
    let numcheck = /[0-9]/;
    let yearcheck = /[0-9]{4}/;
    if (bookname == "" || bookname == " " || bookname.match(namecheck) == null || bookname.length > 255)
        fail = "Вы ввели неверное значение в поле название книги!";
    else if (price == "" || price == " " || price.match(numcheck) == null || price.length >9)
        fail = "Вы ввели неверное значение в поле цена!";
    else if (year == "" || year == " " || year.match(yearcheck) == null || year.length>4)
        fail = "Вы ввели неверное значение в поле год издания!";
    if (!fail) fail=check(bookname,namecheck,"название книги!");
    if (!fail) fail=check(price,numcheck,"цена!");
    if (!fail) fail=check(year,numcheck,"год издания!");
    if(!fail){var u = Number.parseInt(year); if (u<1901 || u>2155) fail = "Неверно введена дата издания!";}
    if(description =="" || description == " " || description.match(namecheck) == null || description.length >500)
        fail = "Вы ввели неверное значение в поле описание книги!";
    if (!fail) fail=check(description,namecheck,"описание книги!");
    if (fail) {
        alert(fail);
        event.preventDefault();
    }

}
function check(obj,reg,str){
    for(let i =0; i<obj.length; i++){
        if(!reg.test(obj.charAt(i))){return "Вы неверно заполнили поле " + str;}
    }
    return false;
}