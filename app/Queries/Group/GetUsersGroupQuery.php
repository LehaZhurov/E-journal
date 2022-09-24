<?php
namespace App\Queries\Group;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GetUsersGroupQuery
{

    public static function find(int $groupId): Collection | array
    {
        $users = Group::find($groupId)->users;
        return $users;
    }

}
