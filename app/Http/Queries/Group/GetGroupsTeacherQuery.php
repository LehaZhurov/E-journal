<?php
namespace App\Http\Queries\Group;
use App\Models\Subject;
class GetGroupsTeacherQuery{
        
    public static function find(int $userId) 
    {
        $group = Subject::query()->where('user_id', $userId)
        ->join('group_subject','subjects.id','=','group_subject.subject_id')
        ->join('groups','group_subject.group_id','=','groups.id')
        ->select('groups.*')
        ->groupBy('groups.id')
        ->get();
        return $group;
    }    
        
}