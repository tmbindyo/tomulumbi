<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.dashboard',compact('user'));
    }
    public function albumDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.album_dashboard',compact('user'));
    }
    public function clientDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.client_dashboard',compact('user'));
    }
    public function designDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.design_dashboard',compact('user'));
    }
    public function projectDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.project_dashboard',compact('user'));
    }

}
