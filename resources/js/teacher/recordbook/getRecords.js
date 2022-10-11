
import { getSubjectsGroup } from '../journalform/getSubjectsGroup';
import { getUsersGroup } from './getUsersGroup';
import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { deleteRecord } from './deleteRecord';



//Получение списка аттестаций
export function getRecords(groupId) {
    SendRequest('GET', 'attestation/get/' + groupId)
        .then(data => CreateRecordsTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'))
}

//Создание таблички с аттестациями
function CreateRecordsTable(data) {
    let ratingTable = document.querySelector('#recordstable');
    ratingTable.innerHTML = ' ';
    for (var i = 0; i < data.length; i++) {
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item row d-flex paddingnull')
        li.appendChild(span(data[i]['subject'],'text-left'));
        li.appendChild(span(data[i]['group'], 'text-center'));
        li.appendChild(span(data[i]['value'], 'text-center'));
        li.appendChild(span(data[i]['name'], 'text-right'));
        var attestation_id = data[i]['id'];
        li.ondblclick = function () {
            let confim = confirm('Удалить аттестацию ?');
            if (confim) {
                deleteRecord(attestation_id)
            }
        }
        ratingTable.appendChild(li);
    }



    function span(text, classes = '') {
        let span = document.createElement('span');
        span.setAttribute('class', 'col ' + classes)
        span.innerText = text;
        return span;
    }
}


let group = document.getElementById('record_group');
group.addEventListener("change", function () {
    let subjects = document.querySelector('#record_subject');
    getSubjectsGroup(group.value, subjects);
    let students = document.querySelector('#record_student');
    getUsersGroup(group.value, students);
});

