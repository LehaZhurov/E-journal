<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid" style='width:94%'>
        <form action="#" id='writeoffhours'>
            <label for="hour" class="form-label">Сколько списать часов</label>
            <input type="text" id="hour" name = 'hour' class="form-control" aria-describedby="hourhelp" placeholder='Часы'>
            <div id="HourHelpBlock" class="form-text">
                Введите количество часов 1 пара = 2 часам
            </div>
            <label for="group_select_journal">Группа:</label>
            <select name="group" id="hour_group">
                @foreach ($teacherGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <label for="subject_select_journal">Предмет:</label>
            <select name="subject" id="hour_subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <button class="btn bg-green" type = 'button' id = 'writeoffhoursbtn'>Списать</button>
        </form>
        <div class="container-fluid">
            <h2>Оставшиеся часы</h2>
        </div>
        <div class="container-fluid ">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between container-fluid" >
                    <span>Предмет</span>
                    <span>Группа</span>
                    <span>Часы</span>
                </li>
            </ul>
            <ul class="list-group" id = 'hourstable'>
                
            </ul>
        </div>
    </div>
</div>
