import { SendRequest } from '../../SendRequest.js';
import { load } from '../../load.js';
import { Alert } from '../../Alert.js';
import { getRecords } from './getRecords';


function createRecord(){
    let formRecord = document.querySelector('#record');
    let data = new FormData(formRecord);
    console.log(formRecord.elements.group.value);
    SendRequest('POST', 'attestation/create',data)
    .then(data => getRecords(formRecord.elements.group.value))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
}

document.querySelector('#createrecordbtn').onclick = () => {
    createRecord();
}