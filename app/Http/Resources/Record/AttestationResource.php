<?php

namespace App\Http\Resources\Record;

use Illuminate\Http\Resources\Json\JsonResource;

class AttestationResource extends JsonResource
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
            "group" => $this->group_name,
            "name" => $this->user_name,
            "value" => $this->value,
            "id" => $this->attestation_id,
            "subject" => $this->subject_name,
            "type_attestation" => $this->type_attestation_name
        ];
    }
}
