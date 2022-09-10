<?php

namespace App\Http\Resources\Rating;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentRatingResource extends JsonResource
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
            'rating_id' => $this->id,
            'value' => $this->value,
            'teacher' => $this->teacher_name,
            'subject' => $this->subject_name,
            'num_day' => $this->num_day,
            'num_month' => $this->num_month,
            'year' => $this->year
        ];
    }
}
