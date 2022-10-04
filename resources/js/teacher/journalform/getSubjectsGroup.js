
import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { Alert } from '../../Alert.js';


//Получения списка предметов которые ведет 
//данный преподователь у выбранной группы
export function getSubjectsGroup(id, block) {
    load('body', 'Подгружаю список предметов', true)
    SendRequest('GET', 'get/subjects_group/' + id)
        .then(data => updateSubjectsList(JSON.parse(data)['data'], block))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'))
}

//Вывод списка предметов с сервера
function updateSubjectsList(data, block) {
    block.innerHTML = ' ';
    for (let i = 0; i < data.length; i++) {
        let option = document.createElement('option');
        option.setAttribute('value', data[i]['id']);
        option.innerText = data[i]['name'];
        block.appendChild(option);
    }
    load('body', 'Завершенно', false)
}