import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';

export function createReport(data){
    SendRequest('POST', 'create/report', data)
        .then(data => console.log(data))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'));
}