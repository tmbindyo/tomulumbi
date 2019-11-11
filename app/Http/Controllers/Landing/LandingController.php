<?php

namespace App\Http\Controllers\Landing;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function welcome()
    {

        return view('welcome');
    }

    public function contactSave(Request $request)
    {

        $todo = new Contact();
        $todo->name = $request->name;
        $todo->email = $request->email;
        $todo->message = $request->message;
        $todo->status_id = "9c267c79-162e-4ae1-9340-57a4c5ca5e81";
        $todo->save();

        // Send email to client saying they shall be contacted

        return back()->withStatus(__('Thank you for reaching out, please wait for us to get back to you.'));
    }
}
