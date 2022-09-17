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
    public function index()
    {
        $teacherId = Auth::user()->id;
        $groups = GetGroupsQuery::get();
        $teacherGroups = GetGroupsTeacherQuery::find($teacherId);
        $subjects = GetSubjectGroupForTeacherQuery::find($teacherGroups[0]->id,$teacherId);
        return view('teacher.index', ['groups' => $groups, 'subjects' => $subjects,'teacherGroups' => $teacherGroups]);
    }

    public function getRating(GetRatingRequest $request)
    {
        $ratings = GetTeacherRatingQuery::get($request->all());
        return UserRatingsResource::collection($ratings);
    }


}
