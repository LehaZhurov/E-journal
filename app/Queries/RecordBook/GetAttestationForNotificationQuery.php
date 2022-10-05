<?php
namespace App\Queries\RecordBook;

use App\Models\RecordBook;

class GetAttestationForNotificationQuery
{

    public static function find(int $attestationId): RecordBook
    {
        $attestation = RecordBook::query()
            ->where('record_books.id',$attestationId)
            ->join('users', 'record_books.teacher_id', '=', 'users.id')
            ->join('subjects', 'record_books.subject_id', '=', 'subjects.id')
            ->join('telegram_keys', 'record_books.student_id', '=', 'telegram_keys.user_id')
            ->join('type_attestations', 'record_books.type_attestation_id', '=', 'type_attestations.id')
            ->select(
                'record_books.*',
                'users.name as teacher_name',
                'subjects.name as subject_name',
                'telegram_keys.chat_id as user_chat_id',
                'type_attestations.name as attestation_name'
            );
        return $attestation->first();
    }

}
