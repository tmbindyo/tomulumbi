<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Contact;
use App\ContactType;
use App\Design;
use App\Project;
use App\Traits\ContactWorkCountTrait;
use App\Traits\NavbarTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use ContactWorkCountTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contacts()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get all contacts
        $contacts = Contact::with('status','contact_type')->get();
        // Get contact types
        $contactTypes = ContactType::all();

        return view('admin.contacts',compact('contacts','user','contactTypes','navbarValues'));
    }

    public function contactCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $contacts = Contact::with('user','status','contact_type')->get();
        $contactTypes = ContactType::all();

        return view('admin.contact_create',compact('contacts','user','contactTypes','navbarValues'));
    }

    public function contactStore(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->about = $request->about;
        $contact->contact_type_id = $request->contact_type;
        $contact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contact->user_id = Auth::user()->id;
        $contact->save();
        return redirect()->route('admin.contacts')->withSuccess(__('Contact '.$contact->name.' successfully created.'));
    }

    public function contactShow($contact_id)
    {
        // Check if project type exists
        $contactExists = Contact::findOrFail($contact_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the contact work count
        $contactWorkCount = $this->ContactWorkCount($contact_id);

        $contact = Contact::with('user','status')->where('id',$contact_id)->first();
        $contactTypes = ContactType::all();

        $designs = Design::with('user','status')->where('contact_id',$contact_id)->get();
        $projects = Project::with('user','status')->where('contact_id',$contact_id)->get();
        $albums = Album::with('user','status')->where('contact_id',$contact_id)->get();

        return view('admin.contact_show',compact('contact','user','designs','projects','albums','contactTypes','navbarValues','contactWorkCount'));
    }

    public function contactUpdate(Request $request, $contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->about = $request->about;
        $contact->contact_type_id = $request->contact_type;
        $contact->save();
        return redirect()->route('admin.project.types')->withSuccess('Contact updated!');
    }

    public function contactDelete($contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contact->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $contact->save();

        return back()->withSuccess(__('Contact '.$contact->name.' successfully deleted.'));
    }

    public function contactRestore($contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contact->restore();

        return back()->withSuccess(__('Contact '.$contact->name.' successfully restored.'));
    }


}
