<?php
namespace App\Action\TelegramKey;

use App\Bot\Notifications\UpdateCodeSuccess;
use App\Models\TelegramKey;

class UpdateTelegramKeyAction
{

    public static function execute(int $keyId, int $key): TelegramKey
    {
        $updatedKey = TelegramKey::find($keyId);
        $updatedKey->chat_id = $key;
        $updatedKey->save();
        UpdateCodeSuccess::notify($updatedKey->chat_id);
        return $updatedKey;
    }

}
