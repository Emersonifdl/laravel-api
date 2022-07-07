<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class PersonUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => ['filled', 'string', 'max:100'],
            'role'     => ['filled', 'string', 'max:100'],
            'avatar'   => ['filled', 'string', 'max:150', 'url'],
            'favorite' => ['filled', 'boolean'],
        ];
    }
}
