import '../bootstrap';

import Alpine from 'alpinejs';
import './journalform/appenddayinform'
import './journalform/editRating'
import './journalform/getrating'
import './journalform/RatingTableConstructor'
import { getHour } from './hourscontrol/getHour';
import { getRating } from './journalform/getrating';
window.Alpine = Alpine;



Alpine.start();
window.onload = () => {
    setTimeout(getRating(), 3000);
    getHour();
}