

import {SendRequest} from '../../SendRequest';
import {Alert} from '../../Alert';
export const EditRating = function (block) {
    let form = block.children[0];
    let span = block.children[1];
    let input = form.elements.value;
    let data = form.num_day.value+"."+form.num_month.value+"."+form.year.value;
    //Условия появления и скрытия инпута
    if(input.classList.contains('d-none')){
        input.classList.remove('d-none');
        input.classList.add('rating_input');
        block.classList.add('null_padding');
        span.classList.add('d-none');
    }else{
        input.classList.add('d-none');
        span.classList.remove('d-none');
        block.classList.remove('null_padding');
        input.title = '';
        //Условие если значение пустое
        if(span.innerHTML === "" && input.value != ""){
            span.innerHTML = input.value;
            createRating(form);
        }else if(input.value == span.innerText){

        }else if(span.innerText !== "" && input.value !== ""){
            span.innerHTML = input.value;
            input.value = span.innerHTML;
            updateRating(form);
        }else{
            DeleteRating(form);
            span.innerHTML = input.value;
        }
    }
    if(span.innerHTML === ""){
        input.title = 'Оценка будет выставлена за ' + data;
    }else{
        input.title = 'Оценка будет обновлена за ' + data;
    }
}

function createRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'create/rating', dataForm)
    .then(data => AddIdToTheRatingForm(JSON.parse(data)['data'],form))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
}

function DeleteRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'delete/rating', dataForm)
    .then(data => Alert('Оценка успешно удалена'))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
}

function updateRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'update/rating', dataForm)
    .then(data => Alert('Оценка обновлена','success'))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
}

function AddIdToTheRatingForm(data,form){
    let idInput = form.elements.rating_id;
    let ratingId = data['rating_id'];
    idInput.setAttribute('value',ratingId);
    Alert('Оценка создана','success')
}



