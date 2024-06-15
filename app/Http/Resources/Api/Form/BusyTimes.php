<?php

namespace App\Http\Resources\Api\Form;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Application */
class BusyTimes extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'time' => $this->time
        ];
    }
}
