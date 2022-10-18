import { setYearsForm } from '../journalform/setYearForm';
import { createReport } from './createReport';
import { getReport } from './getReport';

let year = document.querySelector('#years_select_report');
setYearsForm(year);
getReport('#report_form');

document.querySelector('#createreportbtn').onclick = () => {
    createReport('#report_form');
}

