import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';

//Функция создания ключа
export function createCode(data) {
    SendRequest('POST', 'create/code', data)
        .then(data => createSuccess())//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'))
}

function createSuccess() {
    Alert('Код успешно установлен.Обновляю страницу', 'success')
    setTimeout(function () {
        location.reload();
    }, 1000)
}