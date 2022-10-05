<?php

namespace App\Http\Controllers;

use App\Action\TelegramKey\CreateTelegramKeyAction;
use App\Action\TelegramKey\UpdateTelegramKeyAction;
use App\Http\Requests\TelegramKey\TelegramKeyRequest;
use App\Http\Resources\TelegramKey\TelegramKeyResource;

class TelegramKeyController extends Controller
{
    public function create(TelegramKeyRequest $request)
    {
        $result = CreateTelegramKeyAction::execute($request->get('user_id'), $request->get('chat_id'));
        return new TelegramKeyResource($result);
    }

    public function update(TelegramKeyRequest $request)
    {
        $result = UpdateTelegramKeyAction::execute($request->get('user_id'), $request->get('chat_id'));
        return new TelegramKeyResource($result);
    }
}
