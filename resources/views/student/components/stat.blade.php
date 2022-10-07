<div class="container-fluid ">
    <div class="container zero-padding" id='status'>
        <ul class="list-group  flex-column">
            <h2 class = 'margin10'>Мои данные</h2>
            <li class="list-group-item d-flex justify-content-between margin10 border-none">
                <span class = 'margin10'>ФИО:{{ $user->name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between margin10 border-none">
                <span class = 'margin10'>Группа:{{ $user->group->name }}</span>
            </li>
            <h2 class = 'margin10'>Пропуски</h2>
            <li class="list-group-item d-flex justify-content-between margin10 border-none">
                <span class = 'margin10'>Вcего пропусков:{{ $allTruancy }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between margin10 border-none">
                <span class = 'margin10'>В этом году:{{ $truancyForYear }}</span>
            </li>
        </ul>
    </div>
</div>
