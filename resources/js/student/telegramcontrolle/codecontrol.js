import { updateCode } from './updateCode';
import { createCode } from './createCode';

let form = document.querySelector('#tgcodeform');

form.ondblclick = function () {
    viewinput(true);
}

function viewinput(isDisplayNone) {
    let inputCode = document.querySelector('#input_code');
    let viewCode = document.querySelector('#viewcode');
    let helpBlock = document.querySelector('#CodeHelpBlock');
    if (!isDisplayNone) {
        viewCode.classList.remove('d-none');
        inputCode.classList.add('d-none');
        helpBlock.innerText = 'Кликните 2 раза чтоб ввести код'
    } else {
        viewCode.classList.add('d-none');
        inputCode.classList.remove('d-none');
        helpBlock.innerText = 'Кликни меня чтоб закрыть форму'
        helpBlock.onclick = function () {
            viewinput(false);
        }
    }

}

if (form.elements.chat_id.value !== '') {
    document.querySelector('#updatecodebtn').onclick = function () {
        let formData = new FormData(form);
        updateCode(formData);
        viewinput(false);
    }
} else {
    document.querySelector('#createcodebtn').onclick = function () {
        let formData = new FormData(form);
        createCode(formData);
        viewinput(false);
    }


}
