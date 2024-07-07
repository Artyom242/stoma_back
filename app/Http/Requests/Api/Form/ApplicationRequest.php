<?php

namespace App\Http\Requests\Api\Form;

use App\Http\Requests\Api\apiRequest;

class ApplicationRequest extends apiRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'exists:application_types,id'],
            'name' => ['required', 'regex:/^[A-Za-zА-Яа-яЁё]+$/u'],
            'phone' => ['required', 'min:17'],
            'times' => ['required', 'array'],
            'times.*' => ['string', 'in:8:45,9:00 - 10:00,10:00 - 11:00,11:00 - 12:00,12:00 - 13:00,13:00 - 14:00,14:00 - 15:00,15:00 - 16:00,16:00 - 17:00'],
            'dateCreate' => ['required', 'date'],
        ];
    }
}
