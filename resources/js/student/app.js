import '../bootstrap';
import './stat/getRating'
import Alpine from 'alpinejs';
import { getRating } from './stat/getRating';
import { getHour } from './hoursstat/getHour';
window.Alpine = Alpine;



Alpine.start();

window.onload = () => {
    getRating(0);
    getHour();
}