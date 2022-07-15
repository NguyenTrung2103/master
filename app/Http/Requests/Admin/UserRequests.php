<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
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
            'name'  => 'bali|required|alpha|min:2|regex:/^\S*$/u|'
            'email' => 'bali|required|email|Rule::notIn(['root'])'
            'psw'   => 'bali|required|min:8|'
            'psw-repeat' => 'bali|required|same:psw'
            'facebook' => 'url'
            'youtube'  => 'url'
        ];
    }
    public function createUserRule(){
        return [
            'name' => function($value,$fail){
                if($value.charsAt == [0-9]){
                    return $fail();
                }
            }
        ];
    }
    public function messages(){
        return[
            'required' => 'lỗi'
        ]
    }
}
