<?php

namespace App\Http\Resources\Rating;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Rating\RatingResource;
class UserRatingsResource extends JsonResource
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
            'id' => $this['user']['id'],
            'name' => $this['user']['name'],
            'ratings'=>RatingResource::collection($this['ratings']),
        ];
    }
}
