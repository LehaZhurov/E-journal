import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load';
import { Alert } from '../../Alert'

//Получение списка оценок с сервера
export function getRating(page) {
    load('body', 'Загрузка статистики', true)
    SendRequest('POST', 'get/rating/' + page)
        .then(data => CreateRatingTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'));
}
//Создание таблички с историей получения оценок
function CreateRatingTable(data) {
    //Блок куда буде выведен список
    let ratingTable = document.querySelector('#ratingtable');
    for (var i = 0; i < data.length; i++) {
        let li = document.createElement('li');//Создания строки таблички
        li.setAttribute('class', 'list-group-item d-flex row')
        //Элемент таблички
        li.appendChild(span(data[i]['subject'], 'col text-left'));
        //Элмент таблички
        li.appendChild(span(data[i]['value'], 'col text-center'));
        let date = data[i]['num_day'] + "." + data[i]['num_month'] + "." + data[i]['year'];
        li.appendChild(span(date, 'col text-right'));
        // li.appendChild(span(data[i]['teacher']));
        ratingTable.appendChild(li);
    }

    function span(text, classes = 'default') {
        let span = document.createElement('span');
        span.setAttribute('class', classes);
        span.innerText = text;
        return span;
    }
    load('body', 'Загрузка статистики', false)
}
let page = 1;
document.querySelector('#more').onclick = () => {
    getRating(page);
    page = page + 1;
}

