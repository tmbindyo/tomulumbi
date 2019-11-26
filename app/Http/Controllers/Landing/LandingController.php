<?php

namespace App\Http\Controllers\Landing;

use App\Email;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    use ViewTrait;
    public function welcome(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "81e702ff-08ee-49eb-9900-d2f9703a4bbf";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        return view('welcome');
    }

    public function EmailStore(Request $request)
    {
        $email = new Email();
        $email->name = $request->name;
        $email->subject = $request->subject;
        $email->email = $request->email;
        $email->message = $request->message;
        $email->status_id = "9c267c79-162e-4ae1-9340-57a4c5ca5e81";
        $email->save();

        // Send email to client saying they shall be contacted

        return back()->withSuccess(__('Thank you for reaching out, please wait for us to get back to you.'));
    }
}
