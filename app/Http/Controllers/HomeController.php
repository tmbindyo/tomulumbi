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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Admin
        if (Auth::user()->user_type_id == 1){
            return view('admin_dashboard');
            
        // Investor
        } elseif (Auth::user()->user_type_id == 3) {
            return view('investor_dashboard');

        // Project manager
        } elseif (Auth::user()->user_type_id == 4) {
            return view('project_manager_dashboard');
        } else {
            return redirect('login');
        }
            
    }

    public function admin()
    {
        return view('dashboard');
    }
    public function investor()
    {
        return view('investor.dashboard');
    }
    public function projectmanager()
    {
        return view('project.manager.dashboard');
    }
}
