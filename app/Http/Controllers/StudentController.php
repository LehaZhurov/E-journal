<?php

namespace App\Http\Controllers;

use App\Http\Queries\Rating\GetRatingQuery;
use App\Http\Resources\Rating\StudentRatingResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function getRating(int $page) : AnonymousResourceCollection
    {
        $ratings = GetRatingQuery::find($page);
        return StudentRatingResource::collection($ratings);
    }
}
