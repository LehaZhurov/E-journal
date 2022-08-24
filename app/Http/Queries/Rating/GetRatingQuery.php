<?php

namespace App\Http\Queries\Rating;

use App\Models\Rating;
use App\Models\User;
use App\Models\Group;

class GetRatingQuery
{

    public static function get(array $param)
    {
        $group = Group::query()->where('id', $param['group'])->with('users')->first();
        $users = $group->users();
        $users
            ->join('ratings', 'ratings.student_id', '=', 'users.id')
            ->where('ratings.subject_id', $param['subject'])
            ->orderBy('ratings.num_day')
            ->select('users.name as user_name', 'users.id as user_id', 'ratings.*');
        $users = $users->get();
        $userRatings = [];
        foreach ($users as $user) {
            $userRatings[$user->user_id]['user'] = collect([
                'name' => $user->user_name,
                'id' => $user->user_id
            ]);
            $userRatings[$user->user_id]['ratings'][] = collect([
                'value' => $user->value,
                'num_day' => $user->num_day,
                'num_month' => $user->num_month,
                'year' => $user->year,
                'subject_id' => $user->subject_id,
                'teacher_id' => $user->teacher_id,
            ]);
        }
        $userRatings = array_values($userRatings);
        return collect($userRatings);
    }
}
