<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid" style='width:94%'>
        <div class="container-fluid ">
            <ul class="list-group container-fluid">
                <li class="list-group-item d-flex row container-fluid hourstableheader">
                    <span class="col text-left">Предмет</span>
                    <span class="col text-center">Тип</span>
                    <span class="col text-right">Оценка</span>
                </li>
            </ul>
            <ul class="tablestat list-group container-fluid" id='recordstable'>
                @foreach ($records as $record)
                    <li class="list-group-item d-flex row container-fluid">
                        <span class="col text-left">{{ $record->subject_name }}</span>
                        <span class="col text-center">{{ $record->type_attestation_name }}</span>
                        <span class="col text-right">{{ $record->value }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
