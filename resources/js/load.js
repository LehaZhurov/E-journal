export function load(block){
    block.innerHTML = `
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;
}