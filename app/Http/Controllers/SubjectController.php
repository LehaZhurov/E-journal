<?php

namespace App\Http\Controllers;

use App\Http\Queries\Subject\GetSubjectWithTheClockForTeacherQuery;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Subject\SubjectWithTheClockResource;

class SubjectController extends Controller
{
    //Получение списка предметов с кол-вом часов для каждой группы по каждому предмету
    public function getSubjectForTeacher()
    {
        $teacherId = Auth::user()->id;
        $subjects = GetSubjectWithTheClockForTeacherQuery::find($teacherId);
        return SubjectWithTheClockResource::collection($subjects);
    }
}