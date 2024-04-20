<?php

namespace App\Http\Api\Modules\Company\Resources;

use App\Http\Api\Modules\Employee\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'URL' => $this->URL,
            'logo' => $this->getLogoUrls(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'employees' => EmployeeResource::collection($this->whenLoaded('employees')),
        ];
    }

    protected function getLogoUrls(): ?string
    {
        $media = $this->getFirstMedia('logos');
        return $media?->getUrl();
    }
}

