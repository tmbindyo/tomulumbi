<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Campaign;
use App\Contact;
use App\Deal;
use App\Design;
use App\Email;
use App\Journal;
use App\Project;
use App\ToDo;
use App\Traits\NavbarTrait;
use App\Traits\PasswordTrait;
use App\Traits\StatusCountTrait;
use App\Traits\UserTrait;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Organization;
use App\Product;

class ToDoController extends Controller
{
    use UserTrait;
    use PasswordTrait;
    use NavbarTrait;
    use StatusCountTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function toDos()
    {
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get to do status count
        $toDoStatusCount = $this->toDoStatusCount();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','album','project','journal','design','product','email','order','contact','organization','deal','campaign')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','album','project','journal','design','product','email','order','contact','organization','deal','campaign')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','album','project','journal','design','product','email','order','contact','organization','deal','campaign')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','album','project','journal','design','product','email','order','contact','organization','deal','campaign')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->get();
        // Albums
        $albums = Album::get();
        // Designs
        $designs = Design::get();
        // Journals
        $journals = Journal::get();
        // Projects
        $projects = Project::get();
        // Product
        $products = Product::get();
        // Order
        $orders = Order::get();
        // Email
        $emails = Email::get();
        // Contact
        $contacts = Contact::get();
        // Organization
        $organizations = Organization::get();
        // Deal
        $deals = Deal::get();
        // Campaign
        $campaigns = Campaign::get();


        // User
        $user = $this->getAdmin();
        return view('admin.to_dos',compact('products','orders','emails','contacts','organizations','deals','campaigns','pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','albums','designs','journals','projects','navbarValues','toDoStatusCount'));
    }

    public function toDoStore(Request $request)
    {

//        return $request;
        $todo = new ToDo();
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        $todo->is_completed = False;
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        // album
        if($request->is_album){
            $todo->is_album = True;
            $todo->album_id = $request->album_id;
        }else{
            $todo->is_album = False;
        }
        // design
        if($request->is_design){
            $todo->is_design = True;
            $todo->design_id = $request->design;
        }else{
            $todo->is_design = False;
        }
        // journal
        if($request->is_journal){
            $todo->is_journal = True;
            $todo->journal_id = $request->journal;
        }else{
            $todo->is_journal = False;
        }
        // project
        if($request->is_project){
            $todo->is_project = True;
            $todo->project_id = $request->project;
        }else{
            $todo->is_project = False;
        }
        // product
        if($request->is_product){
            $todo->is_product = True;
            $todo->product_id = $request->product;
        }else{
            $todo->is_product = False;
        }
        // order
        if($request->is_order){
            $todo->is_order = True;
            $todo->order_id = $request->order;
        }else{
            $todo->is_order = False;
        }
        // email
        if($request->is_email){
            $todo->is_email = True;
            $todo->email_id = $request->email;
        }else{
            $todo->is_email = False;
        }
        // contact
        if($request->is_contact){
            $todo->is_contact = True;
            $todo->contact_id = $request->contact;
        }else{
            $todo->is_contact = False;
        }
        // organization
        if($request->is_organization){
            $todo->is_organization = True;
            $todo->organization_id = $request->organization;
        }else{
            $todo->is_organization = False;
        }
        // deal
        if($request->is_deal){
            $todo->is_deal = True;
            $todo->deal_id = $request->deal;
        }else{
            $todo->is_deal = False;
        }
        // campaign
        if($request->is_campaign){
            $todo->is_campaign = True;
            $todo->campaign_id = $request->campaign;
        }else{
            $todo->is_campaign = False;
        }


        $todo->status_id = "f3df38e3-c854-4a06-be26-43dff410a3bc";
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return back()->withSuccess(__('To do '.$todo->name.' successfully created.'));
    }

    public function toDoUpdate(Request $request, $to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        $todo->is_completed = False;
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        // album
        if($request->is_album){
            $todo->is_album = True;
            $todo->album_id = $request->album_id;
        }else{
            $todo->is_album = False;
        }
        // design
        if($request->is_design){
            $todo->is_design = True;
            $todo->design_id = $request->design;
        }else{
            $todo->is_design = False;
        }
        // journal
        if($request->is_journal){
            $todo->is_journal = True;
            $todo->journal_id = $request->journal;
        }else{
            $todo->is_journal = False;
        }
        // project
        if($request->is_project){
            $todo->is_project = True;
            $todo->project_id = $request->project;
        }else{
            $todo->is_project = False;
        }
        // product
        if($request->is_product){
            $todo->is_product = True;
            $todo->product_id = $request->product;
        }else{
            $todo->is_product = False;
        }
        // order
        if($request->is_order){
            $todo->is_order = True;
            $todo->order_id = $request->order;
        }else{
            $todo->is_order = False;
        }
        // email
        if($request->is_email){
            $todo->is_email = True;
            $todo->email_id = $request->email;
        }else{
            $todo->is_email = False;
        }
        // contact
        if($request->is_contact){
            $todo->is_contact = True;
            $todo->contact_id = $request->contact;
        }else{
            $todo->is_contact = False;
        }
        // organization
        if($request->is_organization){
            $todo->is_organization = True;
            $todo->organization_id = $request->organization;
        }else{
            $todo->is_organization = False;
        }
        // deal
        if($request->is_deal){
            $todo->is_deal = True;
            $todo->deal_id = $request->deal;
        }else{
            $todo->is_deal = False;
        }
        // campaign
        if($request->is_campaign){
            $todo->is_campaign = True;
            $todo->campaign_id = $request->campaign;
        }else{
            $todo->is_campaign = False;
        }

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

        return back()->withSuccess(__('To do '.$todo->name.' successfully deleted.'));
    }

}
