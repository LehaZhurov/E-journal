<?php
namespace App\Queries\Report;

use App\Models\Group;
use App\Models\Rating;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetRatingsOfReportForMounthQuery
{

    public static function find(int $groupId, string $numMonth, string $yaer)
    {
        $groupQuery = Group::query()
            ->select('name as group_name')
            ->where('id', $groupId)
            ->getQuery();

        $users = User::query()
            ->select('users.*')
            ->where('group_id', $groupId)
            ->selectSub($groupQuery, "group")
            ->get();

        $userIds = $users->modelKeys();

        $ratings = Rating::query()
            ->whereIn('student_id', $userIds)
            ->where('num_month',$numMonth)
            ->orderBy('num_day', "DESC")
            ->select(
                'ratings.value',
                'ratings.num_day',
                'ratings.num_month',
                'ratings.year',
                'ratings.student_id'
            )
            ->addSelect(['subject' =>
                Subject::query()
                    ->whereColumn('id', 'ratings.subject_id')
                    ->select('name'),
                ])
            ->get();
        $usersRatings = self::unitRatingsAndUsers($users,$ratings)->first();
        return $usersRatings;
    }

    private static function unitRatingsAndUsers(Collection $users,Collection $ratings):Collection
    {
        //Нужно из коллекции получить последние оценки по каждому предмету
        //Нужно придумать как это сделать
        foreach($users as $user){
            $user->ratings = collect([]);
            foreach($ratings as $rating){
                if($user->id == $rating->student_id){
                    $user->ratings->push($rating);
                }
            }
        }
        return $users;

    }


}
