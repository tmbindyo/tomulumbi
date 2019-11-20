<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\AlbumType;
use App\Email;
use App\Status;
use App\ToDo;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function emails()
    {
        // User
        $user = $this->getAdmin();
        $emails = Email::with('status')->get();

        return view('admin.emails',compact('emails','user'));
    }

    public function emailShow($email_id)
    {
        // Check if album type exists
        $email = Email::findOrFail($email_id);
        // update status to seen
        $email->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $email->save();

        // email statuses
        $emailStatuses = Status::where('status_type_id','5e230684-dc16-4889-a3d3-9e734726f02a')->get();

        // Email To Do's
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','email')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('email_id',$email->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','email')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('email_id',$email->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','email')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('email_id',$email->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','email')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('email_id',$email->id)->get();

        // User
        $user = $this->getAdmin();

        // Get email
        $email = Email::where('id',$email_id)->with('status')->first();

        return view('admin.email_show',compact('email','user','emailStatuses','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function emailUpdate(Request $request, $email_id)
    {

        $email = Email::findOrFail($email_id);
        $email->status_id = $request->status;
        $email->save();

        return redirect()->route('admin.email.show',$email_id)->withSuccess('Email '. $email->name .' updated!');
    }



}
