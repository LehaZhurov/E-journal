import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { getReport } from './getReport';

export function createReport(data) {
    SendRequest('POST', 'create/report', data)
        .then(data => Alert('Отчет готов', 'success'))//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'));
    getReport('#report_form');
}