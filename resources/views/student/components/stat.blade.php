<div class="container-fluid">
    <div class="container-fluid" id='status'>
        <ul class="list-group list-group-flush flex-column">
            <h2 class = 'margin10'>Мои данные</h2>
            <li class="list-group-item d-flex justify-content-between">
                ФИО:{{ $user->name }}
            </li>
            <li class="list-group-item d-flex justify-content-between">
                Группа:{{ $user->group->name }}
            </li>
            <h2 class = 'margin10'>Пропуски</h2>
            <li class="list-group-item d-flex justify-content-between">
                Вcего пропусков:{{ $allTruancy }}
            </li>
            <li class="list-group-item d-flex justify-content-between">
                В этом году:{{ $truancyForYear }}
            </li>
        </ul>
    </div>
    <br>
    <p>
    <div class="container-fluid " id='rating_history'>
        <h2 class = 'margin10'>История оценок</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex row">
                <span class="mg-5 col text-left">Предмет</span>
                <span class="mg-5 col text-center">Оценка</span>
                <span class="mg-5 col text-right">Дата</span>
                {{-- <span>Предопователь</span> --}}
            </li>
        </ul>
        <ul class="list-group list-group flex-column row tablestat" id='ratingtable'>

        </ul>
    </div>
    <div class="d-flex container-fluid justify-content-center">
        <button id='more' class='btn bg-color'>Еще</button>
    </div>
    </p>
</div>
