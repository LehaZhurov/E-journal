<?php

namespace App\Http\Controllers;

use App\Action\RecordBook\CreateNewRecordToRecordBookAction;
use App\Action\RecordBook\DeleteRecordAction;
use App\Http\Requests\RecordBook\CreateRecordRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\Record\AttestationResource;
use App\Http\Resources\Record\RecordResource;
use App\Queries\RecordBook\GetAttesationGroupQuery;
use Illuminate\Support\Facades\Auth;

class RecordBookController extends Controller
{
    //Метод для создания новой записи в зачетке
    public function create(CreateRecordRequest $request)
    {
        $data = $request->all();
        $data['teacher_id'] = Auth::user()->id;
        $record = CreateNewRecordToRecordBookAction::execute($data);
        return new RecordResource($record);
    }
    //Для измененеия записи в зачетке
    public function delete(int $id)
    {
        $result = DeleteRecordAction::execute($id);
        return new EmptyResource($result);
    }
    //Метод возвращает список аттестаций по id группы
    public function attestationGroup(int $groupId)
    {
        $attestation = GetAttesationGroupQuery::find($groupId);
        return AttestationResource::collection($attestation);
    }
}
