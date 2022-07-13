<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
    public static function ValidatesRequests($request)
    {
        return $request -> validate([
            'name'  => 'bali|required|alpha|min:2|regex:/^\S*$/u|'
            'email' => 'bali|required|email|Rule::notIn(['root'])'
            'psw'   => 'bali|required|min:8|'
            'psw-repeat' => 'bali|required|same:psw'
            'facebook' => 'url'
            'youtube'  => 'url'
        ])
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
}
