import { SendRequest } from '../../SendRequest.js';


//Получени списка предметов с групами и часами по ним
export function getHour(){
    SendRequest('GET', 'get/hours')
    .then(data => CreateHourTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
    .catch(err => console.log(err));
}

//Создание таблички с часами
function CreateHourTable(data) {
    let ratingTable = document.querySelector('#hourstable');
    ratingTable.innerHTML = ' ';
    for (var i = 0; i < data.length; i++){
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item d-flex justify-content-between')
        li.appendChild(span(data[i]['subject']));
        li.appendChild(span(data[i]['hours']));
        ratingTable.appendChild(li);
    }

    function span(text){
        let span = document.createElement('span');
        span.innerText = text;
        return span;
    }
}
