<?php

namespace App\Http\Controllers;

use App\Queries\Rating\CountTruancyStudentForYearQuery;
use App\Queries\Rating\CountTruancyStudentQuery;
use App\Queries\Rating\GetStudentRatingQuery;
use App\Queries\RecordBook\GetRercordsStudentQuery;
use App\Queries\TelegaramKey\GetKeyQuery;
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
        $recordsFromRecordsBook = GetRercordsStudentQuery::find($studentId);
        $user = Auth::user(); //Получение данных пользователя
        $telegramChatId = GetKeyQuery::find($studentId);
        return view('student.index', [
            'allTruancy' => $allTruancy,
            'truancyForYear' => $truancyForYear,
            'user' => $user,
            'records' => $recordsFromRecordsBook,
            'telegramChatId' => $telegramChatId, 
        ]);
    }
    //Получение оценок студента с пагинацией
    public function getRating(int $page): AnonymousResourceCollection
    {
        $studentId = Auth::user()->id;
        $ratings = GetStudentRatingQuery::find($studentId, $page);
        return StudentRatingResource::collection($ratings);
    }
}
