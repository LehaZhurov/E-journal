<?php
namespace App\Http\Queries\Rating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class CountTruancyStudentQuery
{

    public static function get(): int
    {
        $studentId = Auth::user()->id;
        $count = Rating::query()->where('student_id', $studentId)->count();
        return $count;
    }

}
