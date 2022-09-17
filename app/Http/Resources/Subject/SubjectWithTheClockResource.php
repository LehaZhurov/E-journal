<?php

namespace App\Http\Resources\Subject;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectWithTheClockResource extends JsonResource
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
            'group' => $this->group_name,
            'hours' => $this->hours,
            'subject' => $this->subject_name
        ];
    }
}
