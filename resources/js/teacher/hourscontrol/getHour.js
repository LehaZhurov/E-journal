import { SendRequest } from '../../SendRequest.js';
import { getSubjectsGroup } from '../journalform/getSubjectsGroup';
import { load } from '../../load.js';
import { Alert } from '../../Alert.js';

//Получени списка предметов с групами и часами по ним
export function getHour() {
    SendRequest('GET', 'get/hours')
        .then(data => CreateHourTable(data['data']))//Передаем сообщение от сервера
        .catch(err => Alert(err, 'error'));
}

//Создание таблички с часами
function CreateHourTable(data) {
    let ratingTable = document.querySelector('#hourstable');
    ratingTable.innerHTML = ' ';
    for (var i = 0; i < data.length; i++) {
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item row d-flex paddingnull')
        li.appendChild(span(data[i]['subject']));
        li.appendChild(span(data[i]['group'], 'text-center'));
        li.appendChild(span(data[i]['hours'], 'text-right'));
        ratingTable.appendChild(li);
    }

    function span(text, classes = '') {
        let span = document.createElement('span');
        span.setAttribute('class', 'col ' + classes)
        span.innerText = text;
        return span;
    }
    load('body', 'Списываю часы', false);
}

let group = document.getElementById('hour_group');
group.addEventListener("change", function () {
    let subject = document.querySelector('#hour_subject');
    getSubjectsGroup(group.value, subject);
});