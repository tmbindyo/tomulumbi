<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\ToDo;
use App\Traits\PasswordTrait;
use App\Traits\UserTrait;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToDoController extends Controller
{
    use UserTrait;
    use PasswordTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function toDos()
    {
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','album')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','album')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','album')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','album')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->get();
        // Albums
        $albums = Album::get();

        // User
        $user = $this->getAdmin();
        return view('admin.to_dos',compact('pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','albums'));
    }
    public function toDoSave(Request $request)
    {

        $todo = new ToDo();
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        $todo->is_album = $request->is_album;
        if($request->is_album){
            $todo->is_album = True;
            $todo->album_id = $request->album;
        }else{
            $todo->is_album = False;
        }
        $todo->status_id = "f3df38e3-c854-4a06-be26-43dff410a3bc";
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return back()->withStatus(__('To do '.$todo->name.' successfully created.'));
    }
    public function albumToDoSave(Request $request,$album_id)
    {

        $todo = new ToDo();
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        $todo->is_album = $request->is_album;
        $todo->is_album = True;
        $todo->album_id = $album_id;
        $todo->status_id = "f3df38e3-c854-4a06-be26-43dff410a3bc";
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return back()->withStatus(__('To do '.$todo->name.' successfully created.'));
    }
    public function toDoUpdate(Request $request, $to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        // TODO update todo database to from due to due_date
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        if($request->is_album){
            $todo->album_id = $request->album_id;
        }
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return back()->withSuccess('To do '.$todo->name.' updated!');

    }

    public function toDoSetInProgress($to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->status_id = '2a2d7a53-0abd-4624-b7a1-a123bfe6e568';
        $todo->save();

        return back()->withSuccess('To do '.$todo->name.' updated to in progress');
    }

    public function toDoSetCompleted($to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->status_id = 'facb3c47-1e2c-46e9-9709-ca479cc6e77f';
        $todo->date_completed = date('Y-m-d');;
        $todo->save();

        return back()->withSuccess('To do '.$todo->name.' updated to in progress');
    }
    public function toDoDelete($album_type_id)
    {

        $todo = ToDo::findOrFail($album_type_id);
        $todo->delete();

        return back()->withStatus(__('To do '.$todo->name.' successfully deleted.'));
    }

}
