

//Отоброжает экран загрузки
export function load(blockId,text = 'Загрузка',start){
    let block = document.querySelector('#'+blockId)
    //Выводить экран загрузки если функция вызвана с true
    if(start == true){
        let loadblock = document.createElement('div');
        block.classList.add('nonescroll')
        loadblock.setAttribute('style',`
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: white;
            flex-direction:column;
            height: `+window.innerHeight+`px;
            align-items: center;
        `);
    loadblock.setAttribute('id', 'loadblock');
    let spiner = document.createElement('div');
    spiner.setAttribute('class', 'spinner-border text-success');
    loadblock.appendChild(spiner);
    let p = document.createElement('p');
    p.innerText = text;
    loadblock.appendChild(p);
    block.appendChild(loadblock);
    //Скрыть созданный экран переда false
    }else{
        let loadblock = document.querySelector('#loadblock');
        if(loadblock){
            block.removeChild(loadblock);
            block.classList.remove('nonescroll')

        }    
    }
}