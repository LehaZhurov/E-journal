<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid" style='width:80%'>
        <form action="#" id='writeoffhours'>
            <label for="hour" class="form-label">Сколько списать часов</label>
            <input type="text" id="hour" class="form-control" aria-describedby="hourhelp" placeholder='Часы'>
            <div id="HourHelpBlock" class="form-text">
                Введите количество часов 1 пара = 2 часам
            </div>
            <label for="group_select_journal">Группа:</label>
            <select name="group" id="">
                @foreach ($teacherGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <label for="subject_select_journal">Предмет:</label>
            <select name="subject" id="">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <button class="btn bg-green" type = 'button' id = 'writeoffhoursbtn'>Списать</button>
        </form>
        <div class="container-fluid">
            <h2>Оставшиеся часы</h2>
        </div>
    </div>
</div>
