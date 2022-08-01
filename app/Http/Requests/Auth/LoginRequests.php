<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequests extends FormRequest
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
            'email' => 'required|min:2',
            'password' => 'required|min:2',
        ];
    }

    public function getCredential()
    {
        $credential = $this->validated();

        if (! filter_var($credential['email'], FILTER_VALIDATE_EMAIL)) {
            return [
                'username' => $credential['email'],
                'password' => $credential['password'],
            ];
        }

        return $credential;
    }
}
