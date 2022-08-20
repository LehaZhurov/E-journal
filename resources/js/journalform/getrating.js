let group = document.querySelector('#group_select_journal');
let subject = document.querySelector('#subject_select_journal');
let day = document.querySelector('#days_select_journal');
let month = document.querySelector('#months_select_journal');
let year = document.querySelector('#years_select_journal');
import {SendRequest} from '../SendRequest.js';


group.addEventListener("change", function () {
    getRating();
});
subject.addEventListener("change", function () {
    getRating();
});
day.addEventListener("change", function () {
    getRating();
});
month.addEventListener("change", function () {
    getRating();
});
year.addEventListener("change", function () {
    getRating();
});
function getRating() {
        let data_form = document.querySelector('#journal_form');
        let formData = new FormData(data_form);//Создаем объект FormData и передаем в него данные из формы
        // formData.append('inter',document.querySelector('#inter').innerHTML);
        SendRequest('POST','get/rating',formData)
        .then(data => console.log('Load'))//Передаем сообщение от сервера
	    .catch(err => console.log(err));
}