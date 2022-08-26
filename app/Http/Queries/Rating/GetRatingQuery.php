<?php

namespace App\Http\Queries\Rating;

use App\Models\Rating;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Collection;

class GetRatingQuery
{

    public static function get(array $param) : Collection
    {
        $group = Group::query()->where('id', $param['group'])->with('users')->first();
        $users = $group->users()->get()->all();
        // dd($userIds);
        $userRatings = [];
        foreach ($users as $user) {
            $userRatings[$user->id]['user'] = collect([
                'name' => $user->name,
                'id' => $user->id
            ]);
            $userRatings[$user->id]['ratings'] = 
            $user->ratings()
            ->where('num_month',$param['month'])
            ->where('subject_id',$param['subject'])
            ->orderBy('num_day')
            ->get();
        }
        $userRatings = collect(array_values($userRatings));
        return $userRatings;
    }


    
}
