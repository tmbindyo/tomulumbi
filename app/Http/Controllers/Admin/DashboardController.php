<?php

namespace App\Http\Controllers\Admin;

use App\Traits\NavbarTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.dashboard',compact('user','navbarValues'));
    }

}
