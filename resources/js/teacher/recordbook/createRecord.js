import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { getRecords } from './getRecords';

//Функция для создания атестации
function createRecord() {
    let formRecord = document.querySelector('#record');
    let data = new FormData(formRecord);
    SendRequest('POST', 'create/attestation', data)
        .then(data => getRecords(formRecord.elements.group.value))//Передаем сообщение от сервера
        .catch(err => Alert(err, 'error'))
}

document.querySelector('#createrecordbtn').onclick = () => {
    createRecord();
}