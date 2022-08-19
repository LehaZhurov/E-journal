<?php
namespace App\Http\Queries\Rating;
use App\Models\Rating;
use App\Models\User;
use App\Models\Group;

class GetRatingQuery{
        
    public static function get(array $param) : void
    {
        $group = Group::query()->where('name',$param['group']);
        $students = User::query();
    }    
        
}