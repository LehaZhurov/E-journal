<?php
namespace App\Queries\Rating;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Collection;

class GetStudentRatingQuery
{
    //Возврощате список оценок
    public static function find(int $studentId, int $page): Collection | array
    {
        $limit = 40;
        $offset = $limit * $page;
        $ratings = Rating::query()->where('student_id', $studentId)
            ->join('users', 'ratings.teacher_id', '=', 'users.id')
            ->join('subjects', 'ratings.subject_id', '=', 'subjects.id')
            ->select('ratings.*', 'users.name as teacher_name', 'subjects.name as subject_name')
            ->orderBy('ratings.created_at')
            ->offset($offset)
            ->limit($limit);
        return $ratings->get();
    }

}
