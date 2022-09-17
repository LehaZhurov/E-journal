<?php

namespace App\Http\Queries\Subject;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Subject;
class GetSubjectTeacherQuery
{
    //Возврощате список предеметов которые ведет учитель 
    public static function find(int $teacherId): Collection | array
    {
        return Subject::query()->where('user_id', $teacherId)->select('id', 'name')->get();
    }
}
