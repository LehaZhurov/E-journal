
import { getSubjectsGroup } from '../journalform/getSubjectsGroup';
import { getUsersGroup } from './getUsersGroup';



let group = document.getElementById('record_subject');
group.addEventListener("change", function () {
    let subjects = document.querySelector('#record_subject');
    getSubjectsGroup(group.value,subjects);
    let students = document.querySelector('#record_student');
    getUsersGroup(group.value,students);
});