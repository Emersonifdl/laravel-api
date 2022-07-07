<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'role'     => ['required', 'string', 'max:100'],
            'avatar'   => ['filled', 'string', 'max:150', 'url'],
            'favorite' => ['filled', 'boolean'],
        ];
    }
}
