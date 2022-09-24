<?php

namespace App\Queries\Group;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GetGroupsQuery
{
    //Возвращает список групп с их учаcтниками
    public static function get(): Collection | array
    {
        $groups = Group::with('users')->get();
        return $groups;
    }
}
