let group = document.querySelector('#group_select_journal');
let subject = document.querySelector('#subject_select_journal');
let day = document.querySelector('#days_select_journal');
let month = document.querySelector('#months_select_journal');
let year = document.querySelector('#years_select_journal');
import { SendRequest } from '../SendRequest.js';
import { load } from '../load.js';
import { AppendRating } from './createRating.js';


group.addEventListener("change", function () {
    getRating();
});
subject.addEventListener("change", function () {
    getRating();
});
day.addEventListener("change", function () {
    getRating();
});
month.addEventListener("change", function () {
    getRating();
});
year.addEventListener("change", function () {
    getRating();
});
function getRating() {
    let data_form = document.querySelector('#journal_form');
    let journal = document.querySelector('#journal_table');//Блок таблицы
    load(journal);
    let formData = new FormData(data_form);//Создаем объект FormData и передаем в него данные из формы
    // formData.append('inter',document.querySelector('#inter').innerHTML);
    SendRequest('POST', 'get/rating', formData)
        .then(data => AppendRatingInPage(JSON.parse(data)['data']))//Передаем сообщение от сервера
        .catch(err => console.log(err));
}

function AppendRatingInPage(data) {
    let tableSize = 15;
    let journal = document.querySelector('#journal_table');//Блок таблицы
    journal.innerHTML = ' ';
    let stringId;//id строки таблицы
    stringId = 'dateString';
    //Добавление вернхний строки в таблицу
    journal.innerHTML +=
        `<ul class="list-group list-group-horizontal-sm" id = "` + stringId + `">
            `+ getItemTable('Дата/ФИО', '220px') + `
        </ul>`;
    let dateString;
    let dateStringChild;
    //Вывод пользователей
    for (let i = 0; i < data.length; i++) {
        stringId = 'rating_string_num' + i;//id строки где хранатся оценки пользователя
        journal.innerHTML += '<ul class="list-group list-group-horizontal-sm" id = "' + stringId + '"></ul>';
        let string = document.querySelector('#' + stringId);
        string.innerHTML += getItemTable(data[i]['name'], '220px');//Вывод имеен в столбик
        dateString = document.querySelector('#dateString');//Строка где указаны даты
        let userId = data[i]['id']
        for (let j = 0; j < tableSize; j++) {//Перебор оценок пользователя

            let rating = data[i]['ratings'][j];

            if (typeof (rating) !== 'undefined') {//Если запись о оценки с индксом j cущ-ет 
                //Вывод оценки 
                string.innerHTML += getItemTableForm(rating, userId);
                dateStringChild = dateString.querySelectorAll('li');//Дочерние элементы строки с датами
                let lastElementDateStringValue = dateStringChild[dateStringChild.length - 1].innerHTML;//Последний элемент строки с датами
                //Проверка на унакальность дат вверху таблице
                if (rating['num_day'] != lastElementDateStringValue) {
                    dateString.innerHTML += getItemTable(rating['num_day'])
                }

            } else {
                rating = [];
                string.innerHTML += getItemTableForm(rating, userId);
            }

        }



    }
    dateStringChild = dateString.querySelectorAll('li');
    if (dateStringChild.length < tableSize) {
        for (var f = 0; f < tableSize - dateStringChild.length + 1; f++) {
            dateString.innerHTML += getItemTable('');
        }
    }
    appendFunction('ratings', AppendRating)
}


function getItemTable(text, widht = '40px') {
    if (text == '') {
        return '<li class="list-group-item ratings"  style = "color:white;width:' + widht + ';">1</li>'
    } else {
        return '<li class="list-group-item ratings"  style = "width:' + widht + '">' + text + '</li>'
    }
}

function getItemTableForm(data, userId, widht = '40px') {
    let ratingValue = data['value'];
    if (typeof (ratingValue) == 'undefined') {
        ratingValue = '';
    }
    let ratingTeacherId = data['teacher_id'];
    let ratingSubjectId = data['subject_id'];
    if (typeof (ratingSubjectId) == 'undefined') {
        ratingSubjectId = subject.value;
    }
    let numDay, numMonth, Year;
    if (typeof (data['num_day']) != 'undefined') {
        numDay = data['num_day'];
    } else {
        numDay = day.value;
    }
    if (typeof (data['num_month']) != 'undefined') {
        numMonth = data['num_month'];
    } else {
        numMonth = month.value;
    }
    if (typeof (data['year']) != 'undefined') {
        Year = data['year'];
    } else {
        Year = year.value;
    }
    let ratingUserId = userId;
    let block;
    block = `
    <li class="list-group-item ratings"  style = "width:` + widht + `;">
        <form>
            <input type='text' name = 'user_id' value='`+ ratingUserId + `' class='d-none'>
            <input type='text' name = 'teacher_id' value='`+ ratingTeacherId + `' class='d-none'>
            <input type='text' name = 'subject_id' value='`+ ratingSubjectId + `' class='d-none'>
            <input type='text' name = 'num_day' value='`+ numDay + `' class='d-none'>
            <input type='text' name = 'num_month' value='`+ numMonth + `' class='d-none'>
            <input type='text' name = 'year' value='`+ Year + `' class='d-none'>
            <input type='text' name = 'value' value='`+ ratingValue + `' class='d-none rating_input' id = 'ratingInput'>
        </form>
        <span>`+ ratingValue + `</span>
    </li>`
    return block;
}

function appendFunction(className, fun) {
    let blocks = document.querySelectorAll('.' + className);
    for (var i = 0; i < blocks.length - 1; i++) {
        let block = blocks[i];
        block.ondblclick = function () {
            fun(this);
        }
    }
}
