<?php

namespace App\Http\Requests\Api\Form;

use App\Http\Requests\Api\apiRequest;

class ApplicationRequest extends apiRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required'],
            'name' => ['required', 'regex:/^[A-Za-zА-Яа-яЁё]+$/'],
            'phone' => ['required', 'min:17'],
            'times' => ['required'],
            'dateCreate' => ['required'],
        ];
    }
}
