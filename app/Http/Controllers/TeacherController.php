<?php

namespace App\Http\Controllers;

use App\Queries\Group\GetGroupsQuery;
use App\Queries\Group\GetGroupsTeacherQuery;
use App\Queries\Group\GetSubjectsGroupForTeacherQuery;
use App\Queries\Group\GetUsersGroupQuery;
use App\Queries\Rating\GetTeacherRatingQuery;
use App\Http\Requests\Rating\GetRatingRequest;
use App\Http\Resources\Rating\UserRatingsResource;
use Illuminate\Support\Facades\Auth;
use App\Queries\TypeAttestaion\GetTypeAttestationQuery;
class TeacherController extends Controller
{
    //Вывод страницы кабинета учителя
    public function index()
    {
        $teacherId = Auth::user()->id;
        $groups = GetGroupsQuery::get(); //Список всех групп
        //Список групп у которых ведет учитель
        $teacherGroups = GetGroupsTeacherQuery::find($teacherId);
        //Список предметов которые ведет учитель у определенной группы
        $subjects = GetSubjectsGroupForTeacherQuery::find($teacherGroups[0]->id, $teacherId);
        $students = GetUsersGroupQuery::find($teacherGroups[0]->id);
        $typeAttestaions = GetTypeAttestationQuery::find();
        return view('teacher.index',
            [
                'groups' => $groups,
                'subjects' => $subjects,
                'teacherGroups' => $teacherGroups,
                'students'=> $students,
                'typeAttestaions' => $typeAttestaions
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
