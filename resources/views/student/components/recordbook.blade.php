<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid" style='width:94%'>
        <div class="container-fluid zero-padding">
            @if(!$records)
            <ul class="list-group container-fluid">
                <li class="list-group-item d-flex row container-fluid hourstableheader">
                    <span class="col text-center">Предмет</span>
                    <span class="col text-center">Тип</span>
                    <span class="col text-center">Оценка</span>
                </li>
            </ul>
            <ul class="tablestat list-group container-fluid" id='recordstable'>
                @foreach ($records as $record)
                    <li class="list-group-item d-flex row container-fluid">
                        <span class="col text-center">{{ $record->subject_name }}</span>
                        <span class="col text-center">{{ $record->type_attestation_name }}</span>
                        <span class="col text-center">{{ $record->value }}</span>
                    </li>
                @endforeach
            @else
            <div class="container-fluid d-flex justify-content-center margin10">
                <h2>Здесь пока  ничего нет</h2>
            </div>
            @endif
            </ul>
        </div>
    </div>
</div>
