<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultipleFormRequestValidation extends FormRequest
{
    public function rules()
    {
        $formRequests = [
            PlayerFormValidationRequest::class,
            PlayerSkillValidationRequest::class,
        ];

        $rules = [];

        foreach ($formRequests as $source) {
            $rules = array_merge($rules, (new $source)->rules());
        }

        return $rules;
    }
}
