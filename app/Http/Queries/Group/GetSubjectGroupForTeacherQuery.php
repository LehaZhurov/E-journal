<?php
namespace App\Http\Queries\Group;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GetSubjectGroupForTeacherQuery
{

    public static function find($groupId, $teacherId): Collection
    {
        $subject = Group::find($groupId)->subjects()->where('user_id',$teacherId)->get();
        return $subject;
    }

}
