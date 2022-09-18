import '../bootstrap';

import Alpine from 'alpinejs';
import './journalform/appenddayinform'
import './journalform/editRating'
import './journalform/getrating'
import './journalform/RatingTableConstructor'
import { getHour } from './hourscontrol/getHour';
import { getRating } from './journalform/getrating';
import { updateHour } from './hourscontrol/updateHour';

window.Alpine = Alpine;



Alpine.start();
window.onload = () => {
    setTimeout(getRating(), 3000);
    getHour();
}
//Кнопка для списывания часов
document.getElementById('writeoffhoursbtn').onclick = () => {
    let writeOffHours = document.getElementById('writeoffhours');
    let data = new FormData(writeOffHours);
    updateHour(data);
}