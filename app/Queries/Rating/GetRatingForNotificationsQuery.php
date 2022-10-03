<?php
namespace App\Queries\Rating;

use App\Models\Rating;

class GetRatingForNotificationsQuery
{

    public static function find(int $ratingId): Rating
    {
        $rating = Rating::query()
            ->where('ratings.id', $ratingId)
            ->join('users', 'ratings.teacher_id', '=', 'users.id')
            ->join('subjects', 'ratings.subject_id', '=', 'subjects.id')
            ->select('ratings.*', 'users.name as teacher_name', 'subjects.name as subject_name');
        return $rating->first();
    }

}
