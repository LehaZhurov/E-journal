<?php

namespace App\Http\Controllers;

use App\Http\Queries\Rating\GetStudentRatingQuery;
use App\Http\Resources\Rating\StudentRatingResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Queries\Rating\CountTruancyStudentQuery;
use App\Http\Queries\Rating\CountTruancyStudentForYearQuery;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    public function index()
    {
        $allTruancy = CountTruancyStudentQuery::get();
        $truancyForYear = CountTruancyStudentForYearQuery::get(date('Y'));
        $user = Auth::user();
        return view('student.index',['allTruancy' => $allTruancy,'truancyForYear' => $truancyForYear,'user' => $user]);
    }

    public function getRating(int $page) : AnonymousResourceCollection
    {
        $ratings = GetStudentRatingQuery::find($page);
        return StudentRatingResource::collection($ratings);
    }
}
