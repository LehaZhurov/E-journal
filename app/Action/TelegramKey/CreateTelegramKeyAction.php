<?php
namespace App\Action\TelegramKey;
use App\Models\TelegramKey;
class CreateTelegramKeyAction{
        
    public function execute(int $userId, int $key) : TelegramKey
    {
        $newKey = new TelegramKey();
        $newKey->chat_id = $key;
        $newKey->user_id = $userId;
        $newKey->save();
        return $newKey;
    }    
        
}