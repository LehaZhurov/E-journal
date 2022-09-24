<?php
namespace App\Queries\Subject;

use App\Models\Hour;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetSubjectWithTheClockForStudentQuery
{

    public static function find(int $studentId): Collection | array
    {
        $studentGroup = User::find($studentId)->group();
        $subjects = $studentGroup
            ->join('group_subject', 'groups.id', '=', 'group_subject.group_id')
            ->join('subjects', 'group_subject.subject_id', '=', 'subjects.id')
            ->select('subjects.name as subject_name', 'groups.name as group_name')
            ->addSelect(['hours' => Hour::select('value')
                    ->whereColumn('subject_id', 'subjects.id')
                    ->whereColumn('group_id', 'groups.id')
                    ->limit(1)]
            )
            ->orderBy('groups.name')
            ->get();
        return $subjects;
    }

}
