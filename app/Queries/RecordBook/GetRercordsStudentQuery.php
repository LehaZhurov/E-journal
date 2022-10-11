<?php
namespace App\Queries\RecordBook;

use App\Models\RecordBook;
use Illuminate\Database\Eloquent\Collection;

class GetRercordsStudentQuery
{

    //Возврощате список аттестаций определенного студента
    public static function find(int $studentId): Collection | array
    {
        $records = RecordBook::query()
            ->where('student_id', $studentId)
            ->join('type_attestations', 'record_books.type_attestation_id', '=', 'type_attestations.id')
            ->join('users', 'users.id', '=', 'record_books.student_id')
            ->join('subjects', 'subjects.id', '=', 'record_books.subject_id')
            ->select(
                'record_books.value as value',
                'subjects.name  as subject_name',
                'type_attestations.name as type_attestation_name',
            );
        return $records->get();
    }

}
