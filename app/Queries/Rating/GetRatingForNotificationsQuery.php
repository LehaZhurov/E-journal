<?php
namespace App\Queries\Rating;

use App\Models\Rating;

class GetRatingForNotificationsQuery
{

    public static function find(int $ratingId): Rating | null
    {
        $rating = Rating::query()
            ->where('ratings.id', $ratingId)
            ->join('users', 'ratings.teacher_id', '=', 'users.id')
            ->join('subjects', 'ratings.subject_id', '=', 'subjects.id')
            ->join('telegram_keys', 'ratings.student_id', '=', 'telegram_keys.user_id')
            ->select(
                'ratings.*', 
                'users.name as teacher_name', 
                'subjects.name as subject_name',
                'telegram_keys.chat_id as user_chat_id'
            );
        return $rating->first();
    }

}
