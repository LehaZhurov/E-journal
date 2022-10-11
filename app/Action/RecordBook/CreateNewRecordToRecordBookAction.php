<?php
namespace App\Action\RecordBook;

use App\Models\RecordBook;
use App\Bot\Notifications\ResultAttestation;

class CreateNewRecordToRecordBookAction
{

    //Создает аттестацию , но не создаст её если 
    //она была выставлена , то вернете ранее созданую 
    //оценку
    public static function execute(array $recordData): RecordBook
    {
        $record = RecordBook::query()
            ->where('subject_id', $recordData['subject_id'])
            ->where('student_id', $recordData['student_id']);
        if ($record->exists()) {
            return $record->first();
        }
        $record = new RecordBook();
        $record->value = $recordData['value'];
        $record->student_id = $recordData['student_id'];
        $record->teacher_id = $recordData['teacher_id'];
        $record->subject_id = $recordData['subject_id'];
        $record->type_attestation_id = $recordData['type_id'];
        $record->save();
        ResultAttestation::notify($record->id);
        return $record;
    }

}
