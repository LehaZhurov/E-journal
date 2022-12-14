import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { getHour } from '../hourscontrol/getHour';


//Функия для списывания часов
export function updateHour(data){
    load('body','Списываю часы',true);
    SendRequest('POST', 'patch/hour',data)
    .then(data => getHour())//Передаем сообщение от сервера
    .catch(err => err => Alert(err, 'error'));
}