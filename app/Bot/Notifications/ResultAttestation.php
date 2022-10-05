<?php

namespace App\Bot\Notifications;

use App\Bot\TelegramBot;
use App\Queries\RecordBook\GetAttestationForNotificationQuery;

class ResultAttestation
{
    //Отпровляет уведомление пользователю о новой оценке
    public static function notify($attestationId): bool
    {
        $attestation = GetAttestationForNotificationQuery::find($attestationId);
        if ($attestation == null) {
            return false;
        }
        $telegramKey = env('TELEGRAM_KEY');
        $tgbot = TelegramBot::new ($telegramKey);
        $text = self::messageText(
            $attestation->value,
            $attestation->subject_name,
            $attestation->teacher_name,
            $attestation->created_at,
            $attestation->attestation_name
        );
        $tgbot->sendMessage($attestation->user_chat_id, $text);
        return true;
    }

    protected static function messageText(
        string $attestation,
        string $subject,
        string $teacherName,
        string $date,
        string $attestationName
    ) {
        $text = "Вас аттестовали по {$subject} вам поставили *{$attestation}*;\r\n{$attestationName} | {$date} | {$teacherName}";
        return $text;
    }

}
