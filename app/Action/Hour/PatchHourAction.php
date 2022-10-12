<?php
namespace App\Action\Hour;

use App\Models\Hour;

class PatchHourAction
{
    //метод который используется для списания часов 
    //принимает кол-во часов которые нужно списать
    //,id группы и id предмета у которых и по которому 
    //нужно списать те самые часы
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
