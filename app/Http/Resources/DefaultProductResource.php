<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DefaultProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->product_name,
            'description' => $this->product_description,
            'price' => $this->product_price,
            'image_url' => $this->image_url,
            'total_available' => $this->total_available,
            'total_selled' => $this->total_selled,
        ];
    }
}
