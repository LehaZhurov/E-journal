import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load';

function getRating(page){
    load('body','Загрузка статистики',true)
    SendRequest('POST', 'get/rating/'+page)
    .then(data => CreateRatingTable(JSON.parse(data)['data']))//Передаем сообщение от сервера
    .catch(err => console.log(err));
}

function CreateRatingTable(data) {
    let ratingTable = document.querySelector('#ratingtable');
    for (var i = 0; i < data.length; i++){
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item d-flex justify-content-between')
        li.appendChild(span(data[i]['subject']));
        li.appendChild(span(data[i]['value']));
        let date = data[i]['num_day']+"."+data[i]['num_month']+"."+data[i]['year'];
        li.appendChild(span(date));
        // li.appendChild(span(data[i]['teacher']));
        ratingTable.appendChild(li);
    }

    function span(text){
        let span = document.createElement('span');
        span.innerText = text;
        return span;
    }
    load('body','Загрузка статистики',false)
}
let page = 1;
document.querySelector('#more').onclick = () =>{
    getRating(page);
    page = page + 1;
}

window.onload = () => {
    getRating(0);
}