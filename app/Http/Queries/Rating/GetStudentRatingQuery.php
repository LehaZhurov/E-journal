<?php
namespace App\Http\Queries\Rating;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetStudentRatingQuery
{

    public static function find(int $page) : Collection
    {
        $limit = 40;
        $offset = $limit * $page;
        $studentId = Auth::user()->id;

        $ratings = Rating::query()->where('student_id', $studentId)
            ->join('users', 'ratings.teacher_id','=','users.id')
            ->join('subjects', 'ratings.subject_id','=','subjects.id')
            ->select('ratings.*','users.name as teacher_name','subjects.name as subject_name')
            ->orderBy('created_at')
            ->offset($offset)
            ->limit($limit);
        return $ratings->get();
    }

}
