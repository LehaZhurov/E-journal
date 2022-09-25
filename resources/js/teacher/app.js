import '../bootstrap';

import Alpine from 'alpinejs';
import './journalform/appenddayinform';
import './journalform/editRating';
import './journalform/getrating';
import './journalform/RatingTableConstructor';
import './recordbook/getRecords';
import './recordbook/createRecord'
import { getHour } from './hourscontrol/getHour';
import { getRating } from './journalform/getrating';
import { updateHour } from './hourscontrol/updateHour';
import { getRecords } from './recordbook/getRecords';
window.Alpine = Alpine;



Alpine.start();
window.onload = () => {
    setTimeout(getRating(), 3000);
    getHour();
    getRecords( document.getElementById('record_group').value );
}
//Кнопка для списывания часов
document.getElementById('writeoffhoursbtn').onclick = () => {
    let writeOffHours = document.getElementById('writeoffhours');
    let data = new FormData(writeOffHours);
    updateHour(data);
}