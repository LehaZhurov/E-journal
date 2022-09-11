<?php
namespace App\Http\Queries\Rating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
class CountTruancyStudentForYearQuery{
        

    public static function get(string $year) : int
    {
        $studentId = Auth::user()->id;
        $count = Rating::query()
        ->where('student_id', $studentId)
        ->where('value','нб')
        ->where('year', $year)->count();
        return $count;
    }    
        
}