<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function offerings() {
        return view('offering');
    }

    public function admin()
    {
        return view('dashboard');
    }
    public function investor()
    {
        return view('investor.dashboard');
    }
    public function investorDepth()
    {
        return view('investor.in-depth');
    }
    public function projectmanagerInDepth()
    {
        return view('projectmanager.in-depth');
    }
}
