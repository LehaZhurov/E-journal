<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid" style='width:94%'>
        <form action="#" id='record'>
            <label for="record_value" class="form-label">Оценка/Зачет/Не аттестован</label>
            <input type="text" id="record_value" name='value' class="form-control" aria-describedby="recordhelp"
                placeholder='Значение'>
            <div id="HourHelpBlock" class="form-text">
                Можете поставить оценку , зачет(указвав букву З) или НБ
            </div>
            <label for="record_group">Группа:</label>
            <select name="group" id="record_group">
                @foreach ($teacherGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <label for="record_subject">Предмет:</label>
            <select name="subject_id" id="record_subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <label for="record_type">Тип аттестации:</label>
            <select name="type_id" id="record_type">
                @foreach ($typeAttestaions as $typeAttestaion)
                    <option value="{{ $typeAttestaion->id }}">{{ $typeAttestaion->name }}</option>
                @endforeach
            </select>
            <label for="record_student">Студент:</label>
            <select name="student_id" id="record_student">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            <button class="btn bg-green" type='button' id='createrecordbtn'>Выставить</button>
        </form>
        <div class="container-fluid">
            <h2>Список аттестаций <span id="groupnamerecord">группы</span></h2>
            <div id="HourHelpBlock" class="form-text">
                Удалить аттестацию можно дважды кликнув на неё
            </div>
        </div>
        <div class="container-fluid ">
            <ul class="list-group container-fluid">
                <li class="list-group-item d-flex row container-fluid hourstableheader">
                    <span class="col text-left">Предмет</span>
                    <span class="col text-center">Группа</span>
                    <span class="col text-center">Оценка</span>
                    <span class="col text-right">Студент</span>
                </li>
            </ul>
            <ul class="tablestat list-group container-fluid" id='recordstable'>

            </ul>
        </div>
    </div>
</div>
