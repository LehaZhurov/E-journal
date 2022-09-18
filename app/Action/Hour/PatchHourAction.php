<?php
namespace App\Action\Hour;

use App\Models\Hour;

class PatchHourAction
{

    public static function execute(int $hour, int $groupId, int $subjectId)
    {
        $hours = Hour::query()
            ->where('subject_id', $subjectId)
            ->where('group_id', $groupId)
            ->first();
        $newValue = $hours->value - $hour;
        if($hours->value < 0){
            return $hours;
        }
        $hours->value = $newValue;
        $hours->save();
        return $hours;
    }

}
