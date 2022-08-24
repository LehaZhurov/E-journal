



export const AppendRating = function (block) {
    let form = block.children[0].children;
    let span = block.children[1];
    let input = form[6];
    if(input.classList.contains('d-none')){
        input.classList.remove('d-none');
        input.classList.add('rating_input');
        block.classList.add('null_padding');
        span.classList.add('d-none');
    }else{
        input.classList.add('d-none');
        span.classList.remove('d-none');
        block.classList.remove('null_padding');
    }
    if(input.value != ''){
        span.innerHTML = input.value;
    }else{
        span.innerHTML = ' ';
    }
    SelectQueryRating(block);
}

function SelectQueryRating(block){
    console.log(block);
}





