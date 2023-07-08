<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'office_id' => $this->office_id,
            'room_id' => $this->room_id,
            'type' => $this->type,
            'start_date' => date('d-m-Y', strtotime($this->start_date)),
            'end_date' => date('d-m-Y', strtotime($this->end_date)),
            'start_time' => substr($this->start_time, 0, 5),
            'end_time' => substr($this->end_time, 0, 5),

        ];
    }
}
