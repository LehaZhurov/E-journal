<?php

namespace App\Bot\Notifications;

use App\Bot\TelegramBot;
use App\Queries\Rating\GetRatingForNotificationsQuery;

class UpdateRating
{
    //Отпровляет уведомление пользователю о новой оценке
    public static function notify($ratingId): bool
    {
        $rating = GetRatingForNotificationsQuery::find($ratingId);
        if ($rating == null) {
            return false;
        }
        $telegramKey = env('TELEGRAM_KEY');
        $tgbot = TelegramBot::new ($telegramKey);
        $text = self::messageText(
            $rating->value,
            $rating->subject_name,
            $rating->teacher_name,
            $rating->num_day,
            $rating->num_month,
            $rating->year,
        );
        $tgbot->sendMessage($rating->user_chat_id, $text);
        return true;
    }

    protected static function messageText(
        string $rating,
        string $subject,
        string $teacherName,
        string $numDay,
        string $numMonth,
        string $numYear,
    ) {
        $text = "Вам изменили оценку на *{$rating}* за {$numDay}.{$numMonth}.{$numYear};\r\n{$subject} | {$teacherName}";
        return $text;
    }

}
