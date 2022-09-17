import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { getSubjectGroup } from '../journalform/getSubjectGroup';

export function getHour(){
    SendRequest('GET', 'get/hours')
    .then(data => CreateHourTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
    .catch(err => console.log(err));
}


function CreateHourTable(data) {
    let ratingTable = document.querySelector('#hourstable');
    for (var i = 0; i < data.length; i++){
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item d-flex justify-content-between')
        li.appendChild(span(data[i]['subject']));
        li.appendChild(span(data[i]['group']));
        li.appendChild(span(data[i]['hours']));
        ratingTable.appendChild(li);
    }

    function span(text){
        let span = document.createElement('span');
        span.innerText = text;
        return span;
    }
}

let group = document.getElementById('hour_group');
group.addEventListener("change", function () {
    let subject = document.querySelector('#hour_subject');
    getSubjectGroup(group.value,subject);
});