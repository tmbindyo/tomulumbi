<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ToDo;
use App\Traits\NavbarTrait;
use App\Traits\UserTrait;

class CalendarController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewCalender()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // Get events
        $toDos = ToDo::with('user','status','album','project','journal','design','product','email','order','contact','organization','deal','campaign','asset','kit','asset_action')->get();

        // Add events table for coming projects(event date, reminder, client, time, cost)
        // Event payment
        // Event delivery (client proof)
        return view('admin.calendar',compact('toDos','user','navbarValues'));
    }
}
