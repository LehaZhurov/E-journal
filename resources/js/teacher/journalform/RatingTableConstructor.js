import { EditRating } from './editRating.js';



//Класс который строит журнал
export let RatingTableConstructor = class {
    tableSize = 20;
    journal;
    dateString;
    dateArray = [];
    UserRatings;
    day;
    month;
    year;
    subject;
    group;
    constructor(day, month, year, subject, group) {
        this.day = day;
        this.month = month;
        this.year = year;
        this.subject = subject;
        this.group = group;
    }
    //Добовляет дату в журнал , для создания оценок 
    //которе буду выставлены за данный день
    appendDate(value, update = false) {
        if (!this.dateArray.includes(value)) {
            this.dateArray.push(value);
            this.dateArray = this.dateArray.sort(function (a, b) {
                return a - b;
            })
            if (update) {
                this.appendNewDateRating(value);
            }
        }
    }
    //Добовление пустой ячейки с новой датой к каждому студенту 
    appendNewDateRating(date){
        let UserRatings = this.UserRatings;
        for (let i = 0; i < UserRatings.length; i++) {
            let ratings = UserRatings[i]['ratings']
            UserRatings[i]['ratings'].push({'num_day':date})
            UserRatings[i]['ratings'] = ratings.sort(function (a, b) {    
                return a['num_day'] - b['num_day'];
            })

        }
        this.UserRatings = UserRatings;
        this.AppendDateString();
        this.AppendRatings(UserRatings)
        this.appendFunction('ratings', EditRating)
    }
    //Функция для начала работы
    createTable(UserRatings) {
        this.PrepareDate(UserRatings);
    }


    //Функция подготовливает данные с сервера для 
    //для дальнейшей визуализациии
    PrepareDate(UserRatings) {
        //Сбор массива дней за которые есть оценки
        for (let i = 0; i < UserRatings.length; i++) {
            if (UserRatings[i].ratings.length > 0) {
                let ratings = UserRatings[i]['ratings']
                for (let j = 0; j < ratings.length; j++) {
                    let day = UserRatings[i]['ratings'][j]['num_day'];
                    if (!this.dateArray.includes(day)) {
                        this.dateArray.push(day);
                    }
                }
                UserRatings[i]['ratings'] = ratings.sort(function (a, b) {
                    return a['num_day'] - b['num_day'];
                })
            }

        }
        //Сортировка дней по возростанию
        this.dateArray = this.dateArray.sort(function (a, b) {
            return a - b;
        })
        //Добавление дней из массива в  массивы с рейтингом у каждого пользователя
        for (let j = 0; j < UserRatings.length; j++) {
            let ratings = UserRatings[j]['ratings']
            for (let i = 0; i < this.dateArray.length; i++) {
                    let date = this.dateArray[i];
                    ratings.push({ 'num_day': date })
                }
            //Сортировка массива с рейтингом у каждого пользователя по возростанию дней
            UserRatings[j]['ratings'] = ratings.sort(function (a, b) {
                return a['num_day'] - b['num_day'];
            });
        }

        for (let j = 0; j < UserRatings.length; j++) {
            let ratings = UserRatings[j]['ratings']
            if (ratings.length > this.dateArray.length) {
                for (var i = 0; i < ratings.length; i++) {
                    let rating = ratings[i];
                    for (var k = 0; k < this.dateArray.length; k++) {
                        let date = this.dateArray[k];
                        if(typeof (rating) === 'undefined'){
                            continue;
                        }
                        if(date == rating['num_day'] && rating['value']){
                            delete ratings[i+1];
                        }
                    }
                }
                ratings = ratings.filter((_, index) => ratings.hasOwnProperty(index));
                UserRatings[j]['ratings'] = ratings;
            }
        }
        this.UserRatings = UserRatings;
        this.AppendDateString();
        this.AppendRatings(UserRatings)
        this.appendFunction('ratings', EditRating)
    }
    //Вывод строки с датами
    AppendDateString() {
        this.journal = document.querySelector('#journal_table');//Блок таблицы
        this.journal.innerHTML = ' ';
        let stringId = 'dateString'
        //Добавление вернхний строки в таблицу
        this.journal.innerHTML += `
            <ul class="list-group list-group-horizontal-sm" style = 'text-alight:center;' id = "` + stringId + `">` + this.getItemTable('Дата/ФИО', '300px') + `</ul>
        `;
        this.dateString = document.querySelector('#dateString');//Строка где указаны даты
        for (let i = 0; i < this.tableSize; i++) {
            if (typeof (this.dateArray[i]) != 'undefined') {
                this.dateString.innerHTML += this.getItemTable(this.dateArray[i]);
            } else {
                this.dateString.innerHTML += this.getItemTable('');
            }
        }
    }

    //Вывод сетки оценок с пользователя
    AppendRatings(UserRatings = this.UserRatings) {
        for (let i = 0; i < UserRatings.length; i++) {
            let stringId = 'rating_string_num' + i;//id строки где хранатся оценки пользователя
            this.journal.innerHTML += '<ul class="list-group list-group-horizontal-sm" id = "' + stringId + '"></ul>';
            let tableString = document.querySelector('#' + stringId);
            tableString.innerHTML += this.getItemTable(UserRatings[i]['name'], '300px');//Вывод имеени
            let userId = UserRatings[i]['id']
            //Вывод строки с оценками данного пользователя
            for (let j = 0; j < this.tableSize; j++) {//Перебор оценок пользователя
                let rating = UserRatings[i]['ratings'][j];
                if (typeof (rating) !== 'undefined') {//Если запись о оценки с индксом j cущ-ет 
                    //Вывод оценки 
                    tableString.innerHTML += this.getItemTableForm(rating, userId);
                } else {
                    rating = [];
                    tableString.innerHTML += this.getItemTable();
                }
            }
        }
    }
    //Пусто элмент журнала
    getItemTable(text = '', widht = '40px') {
        if (text == '') {
            return '<li class="list-group-item"  style = "color:white;width:' + widht + ';">1</li>'
        } else {
            return '<li class="list-group-item"  style = "width:' + widht + '">' + text + '</li>'
        }
    }
    //Функциональный элмент журнала
    getItemTableForm(UserRatings, userId, widht = '40px') {
        let ratingValue = UserRatings['value'];
        if (typeof (ratingValue) == 'undefined') {
            ratingValue = '';
        }
        let ratingTeacherId = UserRatings['teacher_id'];
        let ratingSubjectId = UserRatings['subject_id'];
        if (typeof (ratingSubjectId) == 'undefined') {
            ratingSubjectId = this.subject;
        }
        let numDay, numMonth, Year;
        if (typeof (UserRatings['num_day']) != 'undefined') {
            numDay = UserRatings['num_day'];
        } else {
            numDay = this.day;
        }
        if (typeof (UserRatings['num_month']) != 'undefined') {
            numMonth = UserRatings['num_month'];
        } else {
            numMonth = this.month;
        }
        if (typeof (UserRatings['year']) != 'undefined') {
            Year = UserRatings['year'];
        } else {
            Year = this.year;
        }
        let ratingUserId = userId;
        let ratingId = UserRatings['rating_id'];
        let block;
        block = `
        <li class="list-group-item ratings"  style = "width:` + widht + `;">
            <form>
                <input type='text' name = 'user_id' value='`+ ratingUserId + `' class='d-none'>
                <input type='text' name = 'teacher_id' value='`+ ratingTeacherId + `' class='d-none'>
                <input type='text' name = 'subject_id' value='`+ ratingSubjectId + `' class='d-none'>
                <input type='text' name = 'num_day' value='`+ numDay + `' class='d-none'>
                <input type='text' name = 'num_month' value='`+ numMonth + `' class='d-none'>
                <input type='text' name = 'year' value='`+ Year + `' class='d-none'>
                <input type='text' name = 'value' value='`+ ratingValue + `' class='d-none rating_input' id = 'ratingInput'>
                <input type='text' name = 'rating_id' value='`+ ratingId + `' class='d-none rating_input' id = 'ratingId'>
            </form>
            <span>`+ ratingValue + `</span>
        </li>`
        return block;
    }
    //Функция для добавления функции к блоку
    appendFunction(className, fun) {
        let blocks = document.querySelectorAll('.' + className);
        for (var i = 0; i < blocks.length - 1; i++) {
            let block = blocks[i];
            block.ondblclick = function () {
                fun(this);
            }
        }
    }



}