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
        return view('admin.albumDashboard',compact('user'));
    }
    public function clientDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.clientDashboard',compact('user'));
    }
    public function designDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.designDashboard',compact('user'));
    }
    public function projectDashboard()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.projectDashboard',compact('user'));
    }

}
