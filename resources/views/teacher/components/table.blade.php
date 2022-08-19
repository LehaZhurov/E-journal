<div class="container_fluid journal">
    <h2>Журнал</h2>
    <form action="#" id='journal_form'>
        <div id="header_form" class = 'd-flex align-items-center'>
            <label for="group_select_journal">Группа:</label>
            <select name="group" id="group_select_journal">
                @foreach ($groups as $group)
                    @if ($group->name == 'Педагоги')
                        @continue
                    @endif
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <label for="subject_select_journal">Предмет:</label>
			<select name="subject" id="subject_select_journal">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->subject_id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <div id="invis_chapter">
                <label for="months_select_journal">Месяц:</label>
                <select name="month" id="months_select_journal">
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
				<label for="days_select_journal">День:</label>
                <select name="day" id="days_select_journal">
                    <option value="01">Выбирите месяц</option>
                </select>
            </div>
        </div>
    </form>
</div>
