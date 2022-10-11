<?php

namespace App\Bot\Notifications;

use App\Bot\TelegramBot;

class SaveCodeSuccess
{
    //Отпровлет уведомление об успешной привязке кода
    public static function notify(int $chatId): bool
    {
        $telegramKey = env('TELEGRAM_KEY');
        $tgbot = TelegramBot::new ($telegramKey);
        $text = 'Код успешно установлен';
        $tgbot->sendMessage($chatId, $text);
        return true;
    }

}
