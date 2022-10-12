import { SendRequest } from '../../SendRequest.js';
import { Alert } from '../../Alert.js';
import { load } from '../../load.js';
import { getRecords } from './getRecords';


//Функция для удаления аттестации
export function deleteRecord(id) {
    load('body', 'Удаляю', true)
    SendRequest('GET', 'attestation/delete/' + id)
        .then(data => end())//Передаем сообщение от сервера
        .catch(err => Alert('Что то пошло не так', 'error'))
    function end() {
        Alert('Удаленно');
        load('body', 'Удаленно', false)
        let formRecord = document.querySelector('#record');
        getRecords(formRecord.elements.group.value);
    }
}