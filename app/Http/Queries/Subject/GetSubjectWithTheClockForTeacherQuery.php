<?php
namespace App\Http\Queries\Subject;

use App\Models\Subject;
use App\Models\Hour;
use Illuminate\Database\Eloquent\Collection;

class GetSubjectWithTheClockForTeacherQuery
{
    //Возврощате список предметов с группами у которых они идут и кол-во часов по ним
    public static function find(int $teacherId): Collection | array
    {
        $subjects = Subject::query()
            ->where('user_id', $teacherId)
            ->join('group_subject', 'subjects.id', '=', 'group_subject.subject_id')
            ->join('groups','group_subject.group_id', '=', 'groups.id')
            ->select('subjects.name as subject_name','groups.name as group_name')
            ->addSelect(['hours' => Hour::select('value')
                ->whereColumn('subject_id','subjects.id')
                ->whereColumn('group_id','groups.id')
                ->limit(1)]
            )
            ->orderBy('groups.name')
            ->get();
        return $subjects;
    }

}
