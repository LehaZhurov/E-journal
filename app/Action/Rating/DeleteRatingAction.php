<?php
namespace App\Action\Rating;

use App\Models\Rating;

class DeleteRatingAction
{

    public static function execute(int $id): int
    {
        return Rating::destroy($id);
    }

}
