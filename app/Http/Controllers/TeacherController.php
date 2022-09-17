<?php

namespace App\Http\Controllers;

use App\Http\Queries\Group\GetGroupsQuery;
use App\Http\Queries\Group\GetGroupsTeacherQuery;
use App\Http\Queries\Rating\GetTeacherRatingQuery;
use App\Http\Queries\Group\GetSubjectGroupForTeacherQuery;
use App\Http\Requests\Rating\GetRatingRequest;
use App\Http\Resources\Rating\UserRatingsResource;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //Вывод страницы кабинета учителя
    public function index()
    {
        $teacherId = Auth::user()->id;
        $groups = GetGroupsQuery::get();//Список всех групп 
        //Список групп у которых ведет учитель
        $teacherGroups = GetGroupsTeacherQuery::find($teacherId);
        //Список предметов которые ведет учитель у определенной группы
        $subjects = GetSubjectGroupForTeacherQuery::find($teacherGroups[0]->id,$teacherId);
        return view('teacher.index', 
            ['groups' => $groups, 
            'subjects' => $subjects,
            'teacherGroups' => $teacherGroups
            ]
        );
    }
    //Получения оценок
    public function getRating(GetRatingRequest $request)
    {
        $ratings = GetTeacherRatingQuery::get($request->all());
        return UserRatingsResource::collection($ratings);
    }


}
