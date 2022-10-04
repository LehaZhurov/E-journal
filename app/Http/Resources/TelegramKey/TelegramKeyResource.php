<?php

namespace App\Http\Resources\TelegramKey;

use Illuminate\Http\Resources\Json\JsonResource;

class TelegramKeyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'code' => $this->chat_id,
            'user_id' => $this->user_id,
        ];
    }
}
