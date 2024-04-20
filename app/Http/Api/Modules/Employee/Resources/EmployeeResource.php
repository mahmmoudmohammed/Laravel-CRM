<?php

namespace App\Http\Api\Modules\Employee\Resources;

use App\Http\Api\Modules\Company\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_intern' => $this->is_intern,
            'started_at' => $this->started_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'company' => CompanyResource::make($this->whenLoaded('company')),
        ];
    }
}

