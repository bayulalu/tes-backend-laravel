<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'name' => $this->name,
            'idType' => $this->id_type,
            'idNo' => $this->id_no,
            'gender' => $this->gender,
            'mediumAcquisition' => $this->medium_acquisition,
            'createdAt' => $this->created_at->format('c'),
            'updateAt' => $this->updated_at->format('c'),
        ];
    }
}
