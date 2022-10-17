import { setYearsForm } from '../journalform/setYearForm';
import { createReport } from './createReport';


let year = document.querySelector('#years_select_report');
setYearsForm(year);

document.querySelector('#createreportbtn').onclick = () => {
    let form = document.querySelector('#report_form');
    form = new FormData(form);
    createReport(form);
}