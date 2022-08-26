let select_months = document.querySelector('#months_select_journal');
let select_days = document.querySelector('#days_select_journal');


select_months.addEventListener("change", function(){
    let value = select_months.value;
    let num_day = 0;
    if(value == '01'){
        num_day = 30;
    }else if(value == '02'){
        num_day = 28;
    }else if(value == '03'){
        num_day = 31;
    }else if(value == '04'){
        num_day = 30;
    }else if(value == '05'){
        num_day = 31;
    }else if(value == '06'){
        num_day = 30;
    }else if(value == '07'){
        num_day = 31;
    }else if(value == '08'){
        num_day = 31;
    }else if(value == '09'){
        num_day = 30;
    }else if(value == '10'){
        num_day = 31;
    }else if(value == '11'){
        num_day = 30;
    }else if(value == '12'){
        num_day = 31;
    }
    select_days.innerHTML = '';
    for(var i = 0; i <= num_day;i++){
        let myI = i + 1
        if(myI < 10){
            myI = '0'+myI;
        }
        select_days.innerHTML += '<option value="'+myI+'">'+myI+'</option>';
    }

  });