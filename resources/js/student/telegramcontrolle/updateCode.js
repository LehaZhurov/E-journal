import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';

//фунция обновления кода
export function updateCode(data) {
    SendRequest('POST', 'update/code', data)
        .then(data => Alert('Код успешно обновлен', 'success'))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'))
}