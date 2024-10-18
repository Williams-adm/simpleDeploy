<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($customer) {
                return [
                    'id' => $customer->id,
                    'full_name' => $customer->name . ' ' . $customer->paternal_surname . ' ' . $customer->maternal_surname,
                    'type_document' => $customer->type_document,
                    'n_document' => $customer->n_document,
                    'phone' => $customer->prefix . " " . $customer->phone,
                    'email' => $customer->email,
                ];
            })->all(),
        ];
    }
}
