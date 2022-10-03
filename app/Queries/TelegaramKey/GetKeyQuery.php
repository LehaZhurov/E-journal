<?php
namespace App\Queries\TelegaramKey;

use App\Models\TelegramKey;

class GetKeyQuery
{

    public static function find(int $userId): string | bool
    {
        $key = TelegramKey::query()
            ->where('user_id', $userId)
            ->get()
            ->first();
        if ($key == null) {
            return false;
        }
        return $key->chat_id;
    }

}
