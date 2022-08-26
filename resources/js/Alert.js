

export function Alert(text, type) {
    let body = document.querySelector('#work');

    let alert = `
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true">
        <div class="toast-header">
        <strong class="me-auto">E-journal</strong>
        <small>Сейчас</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
        </div>
        <div class="toast-body">
           `+text+`
        </div>
    </div>
    `;
    console.log(text);
    // body.innerHTML += alert;
}