<?php
namespace App\Queries\Group;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GetSubjectsGroupForTeacherQuery
{
    //Возврощате список предметов которые ведет преподователь у данной группы
    public static function find($groupId, $teacherId): Collection
    {
        $subject = Group::find($groupId)->subjects()->where('user_id', $teacherId)->get();
        return $subject;
    }

}
