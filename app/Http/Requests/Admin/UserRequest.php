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
                
                Rule::unique('users')->ignore($this->user),
            ],
            'username' => [
                'required',
                'min:2',
                'max:50',
                Rule::unique('users')->ignore($this->user),
            ],
            'role' => [
                'required',
                'array',
            ],

            'address' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'school_id' => 'nullable|exists:schools,id',
            'type' => 'nullable',
            'parent_id' => 'nullable|exists:users,id',
            'closed' => 'nullable|boolean',
            'code' => [
                'nullable',
                Rule::unique('users')->ignore($this->user),
            ],
            'social_type' => 'nullable|numeric',
            'social_id' => [
                'nullable',
                Rule::unique('users')->ignore($this->user),
            ],
            'social_name' => 'nullable',
            'social_nickname' => 'nullable',
            'social_avatar' => 'nullable|url',
            'description' => 'nullable',
            
        ];
    }
}
