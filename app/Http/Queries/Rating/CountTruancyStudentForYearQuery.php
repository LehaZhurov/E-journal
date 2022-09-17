<?php
namespace App\Http\Queries\Rating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
class CountTruancyStudentForYearQuery{
        
    //Возврощате кол-во прогулов студента за указанный год
    public static function get(int $studentId,string $year) : int
    {
        $count = Rating::query()
        ->where('student_id', $studentId)
        ->where('value','нб')
        ->where('year', $year)->count();
        return $count;
    }    
        
}