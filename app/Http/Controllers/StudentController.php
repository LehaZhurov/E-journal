<?php

namespace App\Http\Controllers;

use App\Queries\Rating\CountTruancyStudentForYearQuery;
use App\Queries\Rating\CountTruancyStudentQuery;
use App\Queries\Rating\GetStudentRatingQuery;
use App\Http\Resources\Rating\StudentRatingResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //Вывод главное страницы в кабинете студента
    public function index()
    {
        $studentId = Auth::user()->id;
        $allTruancy = CountTruancyStudentQuery::get($studentId); //Получение всех прогулов
        $truancyForYear = CountTruancyStudentForYearQuery::get($studentId, date('Y')); //Полчение всех прогулов за год
        $user = Auth::user(); //Получение данных пользователя
        return view('student.index', ['allTruancy' => $allTruancy, 'truancyForYear' => $truancyForYear, 'user' => $user]);
    }
    //Получение оценок студента с пагинацией
    public function getRating(int $page): AnonymousResourceCollection
    {
        $studentId = Auth::user()->id;
        $ratings = GetStudentRatingQuery::find($studentId, $page);
        return StudentRatingResource::collection($ratings);
    }
}
