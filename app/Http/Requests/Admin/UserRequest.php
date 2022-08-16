<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:2',
                'not_regex:/^[@#$%&*]/',

            ],
            'email' => [
                'required',
                'email',

                Rule::unique('users')->ignore($this->user),
            ],
            'username' => [
                'required',
                'min:2',
                'max:50',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => [

                'min:3',
                'max:200',

            ],

            'role' => [
                'required',
                'array',
            ],

        ];
    }
}
