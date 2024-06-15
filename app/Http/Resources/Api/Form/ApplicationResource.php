<?php

namespace App\Http\Resources\Api\Form;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
          'type' => $this->application_type_id,
          'name' => $this->name,
          'phone' => $this->phone,
          'date' => $this->application_date,
          'confirm' => $this->confirm,
        ];
    }
}
