<?php
namespace App\Action\RecordBook;

use App\Models\RecordBook;

class DeleteRecordAction
{
    //Удаляет аттестацию 
    public static function execute(int $recordId): bool | null
    {
        return RecordBook::find($recordId)->delete();
    }

}
