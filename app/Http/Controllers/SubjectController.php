<?php

namespace App\Http\Controllers;

use App\Queries\Subject\GetSubjectWithTheClockForStudentQuery;
use App\Queries\Subject\GetSubjectWithTheClockForTeacherQuery;
use App\Http\Resources\Subject\SubjectWithTheClockResource;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //Получение списка предметов с кол-вом часов для каждой группы по каждому предмету
    public function getSubjectForTeacher()
    {
        $teacherId = Auth::user()->id;
        $subjects = GetSubjectWithTheClockForTeacherQuery::find($teacherId);
        return SubjectWithTheClockResource::collection($subjects);
    }

    //Получение списка предметов с кол-вом часов для каждой группы по каждому предмету
    public function getSubjectForStudent()
    {
        $studentId = Auth::user()->id;
        $subjects = GetSubjectWithTheClockForStudentQuery::find($studentId);
        return SubjectWithTheClockResource::collection($subjects);
    }

}
