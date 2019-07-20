<?php

namespace App\Http\Controllers;

use App\UserType;
use Auth;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $user_type_id = Auth::user()->user_type_id;

        if ($user_type_id == UserType::all()[0]['id']) {

            return redirect()->route('admin.dashboard');

        } elseif ($user_type_id == UserType::all()[1]['id']) {
            return 'user';
        } elseif ($user_type_id == UserType::all()[2]['id']) {
            return 'client';
        } else {
            return '/';
        }
    }


}
