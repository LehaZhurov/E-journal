<?php
namespace App\Http\Queries\Rating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class CountTruancyStudentQuery
{

    public static function get(int $userId): int
    {
        $count = Rating::query()
        ->where('student_id', $userId)
        ->where('value','нб')
        ->count();
        return $count;
    }

}
