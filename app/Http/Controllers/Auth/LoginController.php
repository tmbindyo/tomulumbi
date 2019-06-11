<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserType;
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
    protected $redirectTo = '/home';

    protected function redirectTo()
    {
        $user_type_id = Auth::user()->user_type_id;

        if ($user_type_id == UserType::all()[0]['id']) {
            return '/admin';
        } elseif ($user_type_id == UserType::all()[1]['id']) {
            dd('project user');
        } elseif ($user_type_id == UserType::all()[2]['id']) {
            return '/investor';
        } elseif ($user_type_id == UserType::all()[3]['id']) {
            return '/manager';
        } else {
            Auth::logout();
            return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
