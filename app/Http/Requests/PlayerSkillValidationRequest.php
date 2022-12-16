<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerSkillValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'playerSkills.*.skill'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'playerSkills.*.skill.required'    => 'Please enter player skill',
        ];
    }
}
