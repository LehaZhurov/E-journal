<?php

namespace App\Http\Resources\Record;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
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
            'id' => $this->id,
            'value' => $this->value,
            'student_id' => $this->student_id,
            'teacher_id' => $this->teacher_id,
            'subject_id' => $this->subject_id,
            'type_attestation_id' => $this->type_attestation_id,
            'created_at' => $this->created_at,
        ];
    }
}
