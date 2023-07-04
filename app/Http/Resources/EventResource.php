<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'contractor_id' => $this->contractor_id,
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => date('d-m-Y', strtotime($this->start_date)),
            'end_date' => date('d-m-Y', strtotime($this->end_date)),
            'start_time' => substr($this->start_time, 0, 5),
            'end_time' => substr($this->end_time, 0, 5),
        ];
    }
}
