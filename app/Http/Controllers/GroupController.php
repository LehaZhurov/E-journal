<?php

namespace App\Http\Controllers;

use App\Queries\Group\GetSubjectsGroupForTeacherQuery;
use App\Queries\Group\GetUsersGroupQuery;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Subject\SubjectResource;
use App\Http\Resources\User\UserResource;
class GroupController extends Controller
{
    //Получение предметов которые ведет преподователь для определенной группы 
    public function getSubjects(int $groupId){
        $teacherId = Auth::user()->id;
        $subjects = GetSubjectsGroupForTeacherQuery::find($groupId,$teacherId);
        return SubjectResource::collection($subjects);
    }

    public function getUsers(int $groupId) {
        $users = GetUsersGroupQuery::find($groupId);
        return UserResource::collection($users);
    }
}
