
import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { Alert } from '../../Alert.js';


//Получения списка учатников группы

export function getUsersGroup(id, block) {
    load('body', 'Подгружаю список cтудентов', true)
    SendRequest('GET', 'get/users_group/' + id)
        .then(data => updateUserssList(data['data'], block))//Передаем сообщение от сервера
        .catch(err => Alert(err, 'error'))
}

//Вывод списка предметов с сервера
function updateUserssList(data, block) {
    block.innerHTML = ' ';
    for (let i = 0; i < data.length; i++) {
        let option = document.createElement('option');
        option.setAttribute('value', data[i]['id']);
        option.innerText = data[i]['name'];
        block.appendChild(option);
    }
    load('body', 'Завершенно', false)
}