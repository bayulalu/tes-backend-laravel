<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientDetailResource extends JsonResource
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
            'name' => $this->user->name,
            'idType' => $this->user->id_type,
            'idNo' => $this->user->id_no,
            'gender' => $this->user->gender,
            'dob' => $this->user->dob,
            'address' => $this->user->address,
            'mediumAcquisition' => $this->medium_acquisition,
            'createdAt' => $this->created_at->format('c'),
            'updateAt' => $this->updated_at->format('c'),
        ];
    }
}
