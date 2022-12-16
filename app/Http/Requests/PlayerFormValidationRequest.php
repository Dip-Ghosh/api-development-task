<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerFormValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required',
            'position' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Please enter player name',
            'position.required' => 'Please enter player position',
            'skill.required'    => 'Please enter player skill',
        ];
    }
}
