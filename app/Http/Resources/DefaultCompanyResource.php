<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class DefaultCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->company_name,
            'document' => $this->company_document,
            'phone' => $this->company_phone,
            'email' => $this->company_email,
            'type' => Str::upper($this->company_type->value),
        ];
    }
}
