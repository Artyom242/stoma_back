<?php

namespace App\Http\Requests\Api\Form;

use App\Http\Requests\Api\apiRequest;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends apiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[A-Za-zА-Яа-яЁё]+$/u'],
            'phone' => ['required', 'min:17'],
            'feedback' => ['required', 'string'],
            'rating' => ['max:5', 'integer'],
            'services' => ['array'],
        ];
    }
}
