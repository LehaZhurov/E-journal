<?php
namespace App\Queries\Rating;

use App\Models\Rating;

class CountTruancyStudentQuery
{
    //Возврощате кол-во прогулов за все время 
    public static function get(int $userId): int
    {
        $count = Rating::query()
        ->where('student_id', $userId)
        ->where('value','нб')
        ->count();
        return $count;
    }

}