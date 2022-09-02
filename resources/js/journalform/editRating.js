

import {SendRequest} from '../SendRequest';
import {Alert} from '../Alert';
export const EditRating = function (block) {
    let form = block.children[0];
    let formChild = form.children
    let span = block.children[1];
    let input = formChild[6];
    let data = formChild[3].value+"."+formChild[4].value+"."+formChild[5].value;
    //Условия появления и скрытия инпута
    if(input.classList.contains('d-none')){
        input.classList.remove('d-none');
        input.classList.add('rating_input');
        block.classList.add('null_padding');
        span.classList.add('d-none');
        input.title = 'Оценка будет выставлена за ' + data;
    }else{
        input.classList.add('d-none');
        span.classList.remove('d-none');
        block.classList.remove('null_padding');
        input.title = '';
        //Условие если значение пустое
        if(span.innerHTML === ""){
            span.innerHTML = input.value;
            createRating(form);
        }else if(span.innerText !== ""){
            updateRating(form);
            input.value = span.innerHTML;
        }
    }
}

function createRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'create/rating', dataForm)
    .then(data => Alert('Оценка создана','success'))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))//;
    console.log('Создание оценки')
}

function updateRating(form){
    console.log('Обноление оценки')
    console.log(form);
}





