<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container_fluid journal">
        <form action="#" id='report_form'>
            @csrf
            <div id="header_form_report" class='d-flex justify-content-center'>
                <div class='d-flex align-items-center'>
                    <label for="group_select_report">Группа:</label>
                    <select name="group" id="group_select_report">
                        @foreach ($teacherGroups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='d-flex align-items-center'>
                    <label for="months_select_report">Месяц:</label>
                    <select name="month" id="months_select_report">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class='d-flex align-items-center'>
                    <label for="days_select_report">Год:</label>
                    <select name="year" id="years_select_report">
                    </select>
                </div>
            </div>
            <div id="HourHelpBlock" class="form-text">
                Выбирите группу или год , чтоб подгрузить ведомости или нажмите создать , чтоб создать ведомость
            </div>
    </div>
    <button class="btn bg-green" type='button' id='createreportbtn'>Создать</button>
    </form>
    
    <div class="container-fluid mt-2">
        <h2>Ведомости</h2>
    </div>
    <div class="container-fluid" id = 'parent_block_report'>
        <ul class="list-group container-fluid zero-padding">
            <li class="list-group-item d-flex row container-fluid hourstableheader" >
                <span class  = "col">Файл</span>
            </li>
        </ul>
        <ul class="tablestat list-group container-fluid zero-padding" id = 'reportstable'>
            
        </ul>
    </div>
</div>
</div>