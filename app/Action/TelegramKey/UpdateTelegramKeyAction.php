<?php
namespace App\Action\TelegramKey;
use App\Models\TelegramKey;
class UpdateTelegramKeyAction{
        
    public function execute(int $keyId,int $key) : TelegramKey
    {
        $updatedkey = TelegramKey::find($keyId);
        $updatedkey->chat_id = $key;
        return $updatedkey->save();
    }    
        
}