<?php
namespace App\Queries\Rating;

use App\Models\Rating;

class CountTruancyStudentForYearQuery
{

    //Возврощате кол-во прогулов студента за указанный год
    public static function get(int $studentId, string $year): int
    {
        $count = Rating::query()
            ->where('student_id', $studentId)
            ->where('value', 'нб')
            ->where('year', $year)->count();
        return $count;
    }

}
