<?php

namespace App\Http\Queries\Group;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GetGroupsQuery
{
    //Возвращает список групп с их учатниками
    public static function get(): Collection
    {
        $groups = Group::with('users')->get();
        return $groups;
    }
}
