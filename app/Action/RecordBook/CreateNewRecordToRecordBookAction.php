<?php
namespace App\Action\RecordBook;

use App\Models\RecordBook;

class CreateNewRecordToRecordBookAction
{

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
        return $record;
    }

}
