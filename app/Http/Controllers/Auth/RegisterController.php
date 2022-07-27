<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['name'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'] ?? '',
            'phone' => '090909012345',
            'school_id' => $data['school_id'] ?? null,
            'type' => $data['type'] ?? 0,
            'parent_id' => $data['parent_id'] ?? 0,
            'verified_at' => 'null',
            'closed bool' => false,
            'code' => $data['code'] ?? null,
            'social_type' => $data['social_type'] ?? 0,
            'social_id' => $data['social_id'] ?? null,
            'social_name' => $data['social_name'] ?? '',
            'social_nickname' => $data['social_nickname'] ?? '',
            'social_avatar' => $data['social_avatar'] ?? 'https://fakeimg.pl/300/',
            'description' => 'abc',

        ]);
    }
}
