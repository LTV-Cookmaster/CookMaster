<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'address'=> $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'phone_number' => $this->phone_number,
            'line_of_business' => $this->line_of_business,


        ];
    }
}
