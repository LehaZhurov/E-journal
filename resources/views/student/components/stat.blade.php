<div class="container-fluid">
    <div class="container-fluid" id = 'status'>
        <h2>Мои данные</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                ФИО:{{$user->name}}
            </li>
            <li class="list-group-item d-flex justify-content-between">
                Группа:{{$user->group->name}}
            </li>
        </ul>
    </div>
    <div class="container-fluid" id = 'status'>
        <h2>Пропуски</h2>
        <ul class="list-group ">
            <li class="list-group-item d-flex justify-content-between">
                Вcего пропусков:{{$allTruancy}}
            </li>
            <li class="list-group-item d-flex justify-content-between">
                В этом году:{{$truancyForYear}}
            </li>
        </ul>
    </div>
    <div class="container-fluid " id = 'rating_history'>
        <h2>История оценок</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <span>№</span>
                <span>Предмет</span>
                <span>Оценка</span>
                <span>Дата</span>
                {{-- <span>Предопователь</span> --}}
            </li>
        </ul>
        <ul class="list-group list-group-numbered scroll" id = 'ratingtable'>
            
        </ul>
    </div>
    <div class="d-flex container-fluid justify-content-center">
        <button id = 'more' class = 'btn bg-color'>Еще</button>
    </div>
</div>