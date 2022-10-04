import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { getHour } from '../hourscontrol/getHour';



export function updateHour(data) {
    load('body', 'Списываю часы', true);
    SendRequest('POST', 'patch/hour', data)
        .then(data => getHour())//Передаем сообщение от сервера
        .catch(err => console.log(err));
}