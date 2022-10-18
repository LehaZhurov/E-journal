<?php

namespace App\Bot\Notifications;

use App\Bot\TelegramBot;

class UpdateCodeSuccess
{
    //Отпровляет уведомление об успешном обновление кода
    public static function notify(int $chatId): bool
    {
        $telegramKey = env('TELEGRAM_KEY');
        $tgbot = TelegramBot::new ($telegramKey);
        $text = 'Код успешно обновлен';
        $tgbot->sendMessage($chatId, $text);
        return true;
    }

}
