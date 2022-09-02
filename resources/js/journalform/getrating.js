let group = document.querySelector('#group_select_journal');
let subject = document.querySelector('#subject_select_journal');
let day = document.querySelector('#days_select_journal');
let month = document.querySelector('#months_select_journal');
let year = document.querySelector('#years_select_journal');
let journal;

import { SendRequest } from '../SendRequest.js';
import { load } from '../load.js';
import { AppendRating } from './AppendRating.js';

group.addEventListener("change", function () {
    getRating();
});
subject.addEventListener("change", function () {
    getRating();
});
month.addEventListener("change", function () {
    getRating();
});
year.addEventListener("change", function () {
    getRating();
});
day.addEventListener("change", function () {
    Rating.appendDate(day.value, true);
});

function loadRatingString(){
    let subjectName = subject.innerText.split('\n')[0];
    let loadstatus = 'Загрузка оценок\nПредмет:' + subjectName + "\nДата:" + month.value + '.' + year.value;
    return loadstatus;
}

function getRating() {
    let data_form = document.querySelector('#journal_form');
    journal = document.querySelector('#journal_table');//Блок таблицы;
    journal.innerHTML = ' ';
    load('body',loadRatingString(),true);
    let formData = new FormData(data_form);//Создаем объект FormData и передаем в него данные из формы
    SendRequest('POST', 'get/rating', formData)
        .then(data => GenerateTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
        .catch(err => console.log(err));
}

let Rating;
function GenerateTable(data) {
    Rating = new AppendRating(day.value,month.value,year.value,subject.value,group.value);
    Rating.createTable(data)
    load('body','Завершена',false);
}
window.onload = () => {
    getRating();
}