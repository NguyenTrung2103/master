<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if (Auth::user()->isAdmin()) {
            return '/admin/user';
        }

        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(LoginRequests $request)
    {
        $credentials = $request->getCredential();

        if (! Auth::attempt($credentials)) {
            return back()->with(
                'message',
                'username or password is incorrect'
            );
        }

        if (! Auth::user()->hasVerifiedEmail()) {
            return back()->with(
                'message',
                'you need to verify your email first!'
            );
        }

        $request->session()->regenerate();

        return redirect($this->redirectPath());
    }
}
