<?php

namespace App\Action\Rating;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
class UpdateRatingAction
{

    public static function execute(int $id,int $value) : Rating
    {
        $rating = Rating::findOrFail($id);
        $rating->value = $value;
        $rating->save();
        return $rating;
    }
}
