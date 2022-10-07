import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';

//Получени списка предметов с групами и часами по ним
export function getHour(){
    SendRequest('GET', 'get/hours')
    .then(data => CreateHourTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так', 'error'));
}

//Создание таблички с часами
function CreateHourTable(data) {
    let ratingTable = document.querySelector('#hourstable');
    ratingTable.innerHTML = ' ';
    for (var i = 0; i < data.length; i++){
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item row d-flex')
        li.appendChild(span(data[i]['subject'],'text-center'));
        li.appendChild(span(data[i]['hours'],'text-center'));
        ratingTable.appendChild(li);
    }

    function span(text,classes = ''){
        let span = document.createElement('span');
        span.setAttribute('class','col ' + classes)
        span.innerText = text;
        return span;
    }
}
