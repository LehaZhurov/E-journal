<?php
namespace App\Queries\Report;

use App\Models\Group;
use App\Models\Rating;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class GetRatingsOfReportForMounthQuery
{

    public static function find(int $groupId, string $numMonth, string $yaer): SupportCollection
    {
        //Получаем группу
        $group = Group::query()
            ->select('name as group_name')
            ->where('id', $groupId)
            ->first();
        //Получаем пользователей
        $users = User::query()
            ->where('group_id', $groupId)
            ->get();

        $userIds = $users->modelKeys();
        //Выделение id студентов
        //Получение оценок
        $ratings = Rating::query()
            ->whereIn('student_id', $userIds)
            ->where('num_month', $numMonth)
            ->where('year', $yaer)
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

        return self::prepareData($group, $users, $ratings);
    }

    private static function prepareData(Group $group, Collection $users, Collection $ratings)
    {
        $usersRatings = self::unitRatingForUser($users, $ratings);
        //Разделение оценок по предметам
        foreach ($usersRatings as $userRatings) {
            $userRatings->absenteeisms = self::countAbsenteeism($userRatings->ratings);
            $userRatings->ratings = self::sortRatingsForSubject($userRatings->ratings);
        }
        //Выделение последний оценки по каждому предмету
        $userKey = 0;
        foreach ($usersRatings as $userRatings) {
            //перебериаем пользователей
            foreach ($userRatings->ratings as $subject => $ratings) {
                //Перебираем оценики пользователей
                $thisRatings[$subject] = self::getRatingForMaxNumDay($ratings);
                //И записивыем вместо массива оценок по этому предмету предмету
                //Оценку которя была поставленна поже всего в месяце
            }
            $usersRatings[$userKey]->ratings = $thisRatings;
            $userKey++;
        }
        //Объединямем результаты работы класса в DTO
        $result = collect([
            'group' => $group,
            'users' => $usersRatings,
        ]);

        return $result;
    }

    private static function CountAbsenteeism($ratings)
    {
        $countGrandAbsenteeism = 0;
        $countPastAbsenteeism = 0;
        $countAbsenteeism = 0;
        foreach ($ratings as $rating) {
            if ($rating->value == "уп") {
                $countGrandAbsenteeism++;
                $countAbsenteeism++;
            } elseif ($rating->value == "нб") {
                $countPastAbsenteeism++;
                $countAbsenteeism++;
            }
        }
        $absenteeisms = [
            "grand_absenteeisms" => $countGrandAbsenteeism,
            "past_absenteeisms" => $countPastAbsenteeism,
            "all_absentees" => $countAbsenteeism,
        ];
        return collect($absenteeisms);
    }

    //Из массива оценок возврощате оценку
    //которая является последний в месяце
    private static function getRatingForMaxNumDay(array $ratings)
    {
        $ratings = collect($ratings);
        $ratings = $ratings->sortBy('num_day');
        $lastRating = $ratings->last();
        return $lastRating;
    }
    //Сортировка оценок по предметам
    private static function sortRatingsForSubject($ratings): SupportCollection
    {
        $thisRatings = [];
        foreach ($ratings as $rating) {
            //Помещаем оценки по принцепцу
            //что предмет по которому выставлена оценка
            //является ключ массива в в котором хранятся эти оценки
            $thisRatings[$rating->subject][] = $rating;
        }
        return collect($thisRatings);
    }

    //Объединение оценок и их пользователеями
    private static function unitRatingForUser(Collection $users, Collection $ratings): Collection
    {
        foreach ($users as $user) {
            $user->ratings = collect([]);
            foreach ($ratings as $rating) {
                if ($user->id == $rating->student_id) {
                    $user->ratings->push($rating);
                }
            }
        }
        return $users;
    }
}
