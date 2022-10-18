<?php
namespace App\Action\TelegramKey;

use App\Bot\Notifications\UpdateCodeSuccess;
use App\Models\TelegramKey;

class UpdateTelegramKeyAction
{
    //обновляет телеграм ключ
    public static function execute(int $userId, int $key): TelegramKey
    {
        $updatedKey = TelegramKey::where('user_id',$userId)->first();
        $updatedKey->chat_id = $key;
        $updatedKey->save();
        UpdateCodeSuccess::notify($updatedKey->chat_id);
        return $updatedKey;
    }

}
