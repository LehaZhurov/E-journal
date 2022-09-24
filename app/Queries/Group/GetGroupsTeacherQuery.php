<?php
namespace App\Queries\Group;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Collection;

class GetGroupsTeacherQuery
{
    //Возврощате список групп у которых ведет преподователь
    public static function find(int $userId): Collection | array
    {
        $group = Subject::query()->where('user_id', $userId)
            ->join('group_subject', 'subjects.id', '=', 'group_subject.subject_id')
            ->join('groups', 'group_subject.group_id', '=', 'groups.id')
            ->select('groups.*')
            ->groupBy('groups.id')
            ->get();
        return $group;
    }

}
