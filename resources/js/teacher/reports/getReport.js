import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { load } from '../../load.js';


let year = document.querySelector('#years_select_report');
let group = document.querySelector('#group_select_report');

export function getReport(id) {
    let form = document.querySelector(id);
    form = new FormData(form);
    load('body', 'Подгружаю ведомости', true);
    SendRequest('POST', 'get/report', form)
        .then(data => prepareData(data))//Передаем сообщение от сервера
        .catch(err => err => Alert(err, 'error'));
}

year.addEventListener('change', function () {
    getReport('#report_form');

})
group.addEventListener('change', function () {
    getReport('#report_form');
})


function prepareData(data) {
    let array = data['data'];
    let groupName = group.options[group.selectedIndex].text;
    let yearValue = year.options[year.selectedIndex].text;
    let lenght = array.length
    load('body', 'Подгружаю ведомости', false);
    if (lenght == 0) {
        let reportBlock = document.querySelector('#parent_block_report');
        reportBlock.innerHTML = "<h2>Нет ведомостей " + groupName + " за " + yearValue + "</h2>";
        return false;
    }
    addReports(array);
}

function addReports(data) {
    let reportBlock = document.querySelector('#parent_block_report');
    reportBlock.innerHTML = "";
    let ul = document.createElement('ul');
    ul.setAttribute('class', 'list-group container-fluid zero-padding');
    reportBlock.appendChild(ul);
    for (let i = 0; i < data.length; i++) {
        let li = document.createElement('li');
        li.setAttribute('class', 'list-group-item d-flex row container-fluid file');
        let a = document.createElement('a');
        a.setAttribute('href', data[i]['path'])
        a.innerText = data[i]['name'];
        li.appendChild(a);
        ul.appendChild(li);
    }
}



