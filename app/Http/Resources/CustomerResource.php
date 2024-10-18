<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->name . " " . $this->paternal_surname . " " . $this->maternal_surname,
            'type_document' => $this->type_document,
            'n_document' => $this->n_document,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'country' => $this->country,
            'region' => $this->region,
            'province' => $this->province,
            'city' => $this->city,
            'street' => $this->street,
            'number_phone' => $this->prefix . " " . $this->phone
        ];
    }
}
