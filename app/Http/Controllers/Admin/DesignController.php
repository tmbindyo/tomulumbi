<?php

namespace App\Http\Controllers\Admin;

use App\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function designs()
    {
        // User
        $user = $this->getAdmin();
        // Get albums
        $design = Design::with('user','status')->get();
        return $design;
        return view('admin.personal_albums',compact('design','user'));
    }
}
