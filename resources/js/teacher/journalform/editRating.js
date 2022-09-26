

import {SendRequest} from '../../SendRequest';
import {Alert} from '../../Alert';


//Функция для работы с ячейкой журнала
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
//СОздание новой оценки
function createRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'create/rating', dataForm)
    .then(data => AddIdToTheRatingForm(JSON.parse(data)['data'],form))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
    appendNewRating(form);
}
//Удаление оценки
function DeleteRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'delete/rating', dataForm)
    .then(data => Alert('Оценка успешно удалена'))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
    appendNewRating(form);
}
//Обновление оценки
function updateRating(form){
    let dataForm = new FormData(form);
    SendRequest('POST', 'update/rating', dataForm)
    .then(data => Alert('Оценка обновлена','success'))//Передаем сообщение от сервера
    .catch(err => Alert('Что то пошло не так','error'))
    appendNewRating(form);

}
//Функция для добавлени id созданной оценки для дальнейшего 
//Её обновления или удалени
function AddIdToTheRatingForm(data,form){
    let idInput = form.elements.rating_id;
    let ratingId = data['rating_id'];
    idInput.setAttribute('value',ratingId);
    Alert('Оценка создана','success')
}
//Функиця добовляет созданную оценку в массив оценок
//который хранится в классе TableConstructor
function appendNewRating(form){
    let UserRatings = window.journal.UserRatings;
    for(let i = 0; i < UserRatings.length; i++){
        if(UserRatings[i].id == form.elements.user_id.value){
            for(let j = 0; j < UserRatings[i].ratings.length;j++){
                let rating = UserRatings[i].ratings[j];
                if(rating.num_day === form.elements.num_day.value){
                    UserRatings[i].ratings[j] = {
                        num_day: form.elements.num_day.value,
                        num_month: form.elements.num_month.value,
                        subject_id: form.elements.subject_id.value,
                        teacher_id: form.elements.teacher_id.value,
                        value: form.elements.value.value,
                        year: form.elements.year.value
                    }
                }
            }
        }
    }
}



