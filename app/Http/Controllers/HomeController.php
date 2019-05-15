<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;

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
        $user_id = Auth::user()->id;
        // Admin
        if (Auth::user()->user_type_id == 1){
            return view('admin_dashboard');
            
        // Investor
        } elseif (Auth::user()->user_type_id == 3) {
            // Get projects
            $projects = Project::with(['project_investments'])
                ->whereHas('project_investments', function($q) use($user_id) {
                // Query the name field in status table
                $q->where('investor_id', '=', $user_id); // '=' is optional
            })
            ->where('status_id', '=', 1)
            ->get();
            
            $offers = Project::with(['project_bids'])
                ->whereHas('project_bids', function($q) use($user_id) {
                // Query the name field in status table
                $q->where('user_id', '=', $user_id)->where('status_id', '=', 1); // '=' is optional
            })
            ->where('status_id', '=', 1)
            ->get();

            return view('investor_dashboard')->withProjects($projects)->withOffers($offers);

        // Project manager
        } elseif (Auth::user()->user_type_id == 4) {
            $projects = Project::with(['project_investments'])
                ->whereHas('project_investments', function($q) use($user_id) {
                // Query the name field in status table
                $q->where('user_id', '=', $user_id); // '=' is optional
            })
            ->where('status_id', '=', 1)
            ->get();

            $offers = Project::with(['project_bids'])
                ->whereHas('project_bids', function($q) use($user_id) {
                // Query the name field in status table
                $q->where('user_id', '=', $user_id)->where('status_id', '=', 1); // '=' is optional
            })
            ->where('status_id', '=', 1)
            ->get();
            return view('project_manager_dashboard')->withProjects($projects)->withOffers($offers);
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
