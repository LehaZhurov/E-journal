<?php
namespace App\Queries\Rating;

use App\Models\Group;
use Illuminate\Support\Collection;

class GetTeacherRatingQuery
{

    //Возврощате списк студентов с их оценками
    public static function get(array $param): Collection | array
    {
        $group = Group::query()->where('id', $param['group'])->with('users')->first();
        $users = $group->users()->get()->all();
        $userRatings = [];
        foreach ($users as $user) {
            $userRatings[$user->id]['user'] = collect([
                'name' => $user->name,
                'id' => $user->id,
            ]);
            $userRatings[$user->id]['ratings'] =
            $user->ratings()
                ->where('num_month', $param['month'])
                ->where('year', $param['year'])
                ->where('subject_id', $param['subject'])
                ->orderBy('num_day')
                ->get();
        }
        $userRatings = collect(array_values($userRatings));
        return $userRatings;
    }

}
