import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { getReport } from './getReport';

export function createReport(id) {
    let form = document.querySelector(id);
    form = new FormData(form);
    SendRequest('POST', 'create/report', form)
        .then(data => reportCreate(data))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'));
    
}

function reportCreate(){
    Alert('Отчет готов', 'success')
    getReport('#report_form')
}