<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'office_id' => $this->office_id,
            'name' => $this->name,
            'max_capacity' => $this->max_capacity,
            'price' => $this->price,
            'is_booked' => $this->is_booked,

        ];
    }
}
