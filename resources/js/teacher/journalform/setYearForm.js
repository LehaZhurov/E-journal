

//Добовляет года в форму с журналом 
export function setYearsForm(block) {
    for (let i = 1; i < 4; i++) {
        let date = new Date();
        let option = document.createElement('option');
        let year = date.getFullYear() - i;
        option.setAttribute('value', year);
        option.innerText = year;
        block.appendChild(option);
    }
    for (let i = 0; i < 4; i++) {
        let date = new Date();
        let option = document.createElement('option');
        let year = date.getFullYear() + i;
        if (i == 0) {
            option.setAttribute('selected', '')
        }
        option.setAttribute('value', year);
        option.innerText = year;
        block.appendChild(option);
    }
}