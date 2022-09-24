<?php
namespace App\Action\RecordBook;

use App\Models\RecordBook;

class UpdateRecordToRecordBookAction
{

    public function execute(string $value, int $recordId): RecordBook
    {
        $record = RecordBook::find($recordId);
        $record->value = $value;
        $record->save();
        return $record;
    }

}
