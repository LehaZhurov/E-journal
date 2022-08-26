<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Rating\GetRatingRequest;
use App\Http\Queries\Group\GetGroupsQuery;
use App\Http\Queries\Subject\GetSubjectTeacherQuery;
use App\Http\Queries\Rating\GetRatingQuery;
use App\Http\Resources\Rating\UserRatingsResource;
use App\Models\User;
class TeacherController extends Controller
{
    public function index()
    {
        $groups = GetGroupsQuery::get();
        $subjects = GetSubjectTeacherQuery::find();
        return view('teacher.index', ['groups' => $groups, 'subjects' => $subjects]);
    }

    public function getRating(GetRatingRequest $request)
    {
        $ratings = GetRatingQuery::get($request->all());
        // dd($ratings);
        return UserRatingsResource::collection($ratings);
    }
}
