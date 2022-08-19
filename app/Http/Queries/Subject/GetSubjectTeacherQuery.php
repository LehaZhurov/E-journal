<?php

namespace App\Http\Queries\Subject;

use App\Model\Subject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetSubjectTeacherQuery
{

    public static function find(): Collection
    {
        return Auth::user()->subjects()->select('subject_id','name')->get();
    }
}
