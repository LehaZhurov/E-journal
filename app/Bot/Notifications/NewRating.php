<?php

namespace App\Bot\Notifications;

use App\Bot\TelegramBot;
use App\Queries\Rating\GetRatingForNotificationsQuery;
use App\Queries\TelegaramKey\GetKeyQuery;

class NewRating
{
    //Отпровляет уведомление пользователю о новой оценке
    public static function notify($ratingId, $userId) : bool
    {
        $tgcode = GetKeyQuery::find($userId);
        if(!$tgcode){
            return false;
        }
        $telegramKey = env('TELEGRAM_KEY');
        $rating = GetRatingForNotificationsQuery::find($ratingId);
        $tgbot = TelegramBot::new ($telegramKey);
        $text = self::messageText(
            $rating['value'],
            $rating['subject_name'] ,
            $rating['teacher_name'],
            $rating['num_day'],
            $rating['num_month'],
            $rating['year'],
        );
        $tgbot->sendMessage($tgcode,$text);
        return true;
    }

    protected static function messageText(
        string $rating, 
        string $subject, 
        string $teacherName,
        string $numDay,
        string $numMonth,
        string $numYear,
    )
    {
        $text = "Вам поставили *{$rating}* за {$numDay}.{$numMonth}.{$numYear}.\r\n{$subject}/{$teacherName}";
        return $text;
    }

}
