<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Queries\Group\GetSubjectGroupForTeacherQuery;
use Illuminate\Support\Facades\Auth;
use  App\Http\Resources\Subject\SubjectResource;
class GroupController extends Controller
{
    //Получение предметов которые ведет преподователь для определенной группы 
    public function getSubject(int $groupId){
        $teacherId = Auth::user()->id;
        $subjects = GetSubjectGroupForTeacherQuery::find($groupId,$teacherId);
        return SubjectResource::collection($subjects);
    }
}
