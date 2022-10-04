<?php
namespace App\Action\TelegramKey;

use App\Bot\Notifications\SaveCodeSuccess;
use App\Models\TelegramKey;

class CreateTelegramKeyAction
{

    public static function execute(int $userId, int $key): TelegramKey
    {
        $newKey = new TelegramKey();
        $newKey->chat_id = $key;
        $newKey->user_id = $userId;
        $newKey->save();
        SaveCodeSuccess::notify($newKey->chat_id);
        return $newKey;
    }

}
