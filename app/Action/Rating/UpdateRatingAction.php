<?php

namespace App\Action\Rating;

use App\Models\Rating;

class UpdateRatingAction
{
    //Обновление оценки по её id
    public static function execute(int $id, int $value): Rating
    {
        $rating = Rating::findOrFail($id);
        $rating->value = $value;
        $rating->save();
        return $rating;
    }
}
