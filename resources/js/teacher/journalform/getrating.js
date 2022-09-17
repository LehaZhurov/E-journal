let group = document.querySelector('#group_select_journal');
let subject = document.querySelector('#subject_select_journal');
let day = document.querySelector('#days_select_journal');
let month = document.querySelector('#months_select_journal');
let year = document.querySelector('#years_select_journal');
let journal;

import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { RatingTableConstructor } from './RatingTableConstructor.js';
import { setYearsForm } from './setYearForm';
import { getSubjectGroup } from './getSubjectGroup';


group.addEventListener("change", function () {
    getRating();
    getSubjectGroup(group.value,subject);
    
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
    load('body', 'Добавление дня', true);
    TableConstructor.appendDate(day.value, true);
    load('body', 'Добавление дня', false);
});


//Получения списка пользователей и их оценок для 
//Посторойки журнала
export function getRating() {
    let data_form = document.querySelector('#journal_form');
    journal = document.querySelector('#journal_table');//Блок таблицы;
    journal.innerHTML = ' ';
    load('body', 'Загрузка оценок\nДата:' + month.value + '.' + year.value, true);
    let formData = new FormData(data_form);//Создаем объект FormData и передаем в него данные из формы
    SendRequest('POST', 'get/rating', formData)
        .then(data => GenerateTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
        .catch(err => console.log(err));
}

let TableConstructor;
function GenerateTable(data) {
    TableConstructor = new RatingTableConstructor(day.value, month.value, year.value, subject.value, group.value);
    TableConstructor.createTable(data)
    load('body', 'Завершена', false);
}
setYearsForm(year);
