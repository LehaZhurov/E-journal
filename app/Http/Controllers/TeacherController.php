<?php

namespace App\Http\Controllers;

use App\Http\Queries\Group\GetGroupsQuery;
use App\Http\Queries\Group\GetGroupsTeacherQuery;
use App\Http\Queries\Rating\GetTeacherRatingQuery;
use App\Http\Queries\Subject\GetSubjectTeacherQuery;
use App\Http\Requests\Rating\GetRatingRequest;
use App\Http\Resources\Rating\UserRatingsResource;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $groups = GetGroupsQuery::get();
        $teacherId = Auth::user()->id;
        $teacherGroups = GetGroupsTeacherQuery::find($teacherId);
        $subjects = GetSubjectTeacherQuery::find();
        return view('teacher.index', ['groups' => $groups, 'subjects' => $subjects,'teacherGroups' => $teacherGroups]);
    }

    public function getRating(GetRatingRequest $request)
    {
        $ratings = GetTeacherRatingQuery::get($request->all());
        // dd($ratings);
        return UserRatingsResource::collection($ratings);
    }
}
