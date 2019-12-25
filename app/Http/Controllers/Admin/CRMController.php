<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Deal;
use App\ToDo;
use App\Quote;
use App\Order;
use App\Album;
use App\Title;
use App\Design;
use App\Upload;
use App\Contact;
use App\Project;
use App\Campaign;
use App\Liability;
use App\UploadType;
use App\LeadSource;
use App\ContactType;
use App\CampaignType;
use App\Organization;
use App\Traits\UserTrait;
use App\OrganizationType;
use App\Traits\NavbarTrait;
use App\ContactContactType;
use App\DealStage;
use Illuminate\Http\Request;
use App\PromoCodeAssignment;
use App\Traits\DealWorkCountTrait;
use Illuminate\Support\Facades\File;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use App\Traits\ContactWorkCountTrait;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class CRMController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    use DealWorkCountTrait;
    use ReferenceNumberTrait;
    use ContactWorkCountTrait;
    use DocumentExtensionTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function feed()
    {
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.feed',compact('navbarValues','user'));
    }

    // leads
    public function leads()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get all contacts
        $leads = Contact::where('is_lead',True)->with('status','contact_type','title')->get();
        // Get contact types
        $contactTypes = ContactType::all();

        return view('admin.leads',compact('leads','user','contactTypes','navbarValues'));
    }

    // campaigns
    public function campaigns()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $campaigns = Campaign::with('user','status','campaign_type')->get();
        return view('admin.campaigns',compact('campaigns','user','navbarValues'));

    }

    public function campaignCreate()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // campaign types
        $campaignTypes = CampaignType::all();
        return view('admin.campaign_create',compact('user','navbarValues','campaignTypes'));

    }

    public function campaignStore(Request $request)
    {

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->start_date = date('Y-m-d', strtotime($request->start_date));
        $campaign->end_date = date('Y-m-d', strtotime($request->end_date));
        $campaign->campaign_type_id = $request->type;
        $campaign->expected_revenue = $request->expected_revenue;
        $campaign->actual_cost = 0;
        $campaign->budgeted_cost = $request->budgeted_cost;
        $campaign->description = $request->description;
        $campaign->expected_response = $request->expected_response;
        $campaign->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();
        return redirect()->route('admin.campaign.show',$campaign->id)->withSuccess('Campaign created!');

    }

    public function campaignShow($campaign_id)
    {
        // Check if contact type exists
        $campaignExists = Campaign::findOrFail($campaign_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get campaign types
        $campaignTypes = CampaignType::all();
        // Get campaigns
        $campaign = Campaign::with('user','status','campaign_type','campaign_uploads','contacts','expenses','organizations','to_dos')->withCount('campaign_uploads','contacts','expenses','organizations','to_dos')->where('id',$campaign_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','campaign')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('campaign_id',$campaign->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','campaign')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('campaign_id',$campaign->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','campaign')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('campaign_id',$campaign->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','campaign')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('campaign_id',$campaign->id)->get();

        return view('admin.campaign_show',compact('campaign','user','navbarValues','campaignTypes','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function campaignUploads($campaign_id)
    {
        // Check if contact type exists
        $campaignExists = Campaign::findOrFail($campaign_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get campaign types
        $campaignTypes = CampaignType::all();
        // Get campaigns
        $campaign = Campaign::with('user','status','campaign_type','campaign_uploads','contacts','expenses','organizations','to_dos')->withCount('campaign_uploads','contacts','expenses','organizations','to_dos')->where('id',$campaign_id)->first();
        // Campaign uploads
        $campaignUploads = Upload::with('user','status')->where('id',$campaign_id)->get();


        return view('admin.campaign_uploads',compact('campaign','user','navbarValues','campaignTypes','campaignUploads'));
    }

    public function campaignUpload($campaign_id)
    {
        // Check if contact type exists
        $campaignExists = Campaign::findOrFail($campaign_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get campaign types
        $campaignTypes = CampaignType::all();
        // Get campaigns
        $campaign = Campaign::with('user','status','campaign_type','campaign_upload','contacts','expenses','organizations','to_dos')->withCount('campaign_upload','contacts','expenses','organizations','to_dos')->where('id',$campaign_id)->first();
        // Campaign uploads
        $campaignUploads = Upload::with('user','status')->where('id',$campaign_id)->first();
        // upload types
        $uploadTypes = UploadType::all();


        return view('admin.campaign_uploads',compact('campaign','user','navbarValues','campaignTypes','uploadTypes'));
    }

    public function campaignUploadStore(Request $request,$campaign_id)
    {

        $campaign = Campaign::where('id',$campaign_id)->first();
        $originalFolderName = str_replace(' ', '', $campaign->name."/");

        $file = $request->file('file');
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        Storage::disk('local')->putFileAs(
            'work/campaign/'.$originalFolderName,
            $file,
            $file_name_extension
        );

        $path = public_path()."/work/campaign/".$originalFolderName.$file_name_extension;

        $size = $request->file('file')->getSize();
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        // Get the navbar values
        $extensionType = $this->uploadExtension($extension);

        $Artist = "Pending";
        $ApertureFNumber = "Pending";
        $Copyright = "Pending";
        $Height = "Pending";
        $Width = "Pending";
        $DateTime = "Pending";
        $ShutterSpeed = "Pending";
        $FileName = "Pending";
        $FileSize = "Pending";
        $ISOSpeedRatings = "Pending";
        $FocalLength = "Pending";
        $LightSource = "Pending";
        $MaxApertureValue = "Pending";
        $MimeType = "Pending";
        $Make = "Pending";
        $Model = "Pending";
        $Software = "Pending";


        $upload = new Upload();
        $upload->artist = $Artist;
        $upload->aperture_f_number = $ApertureFNumber;
        $upload->copyright = $Copyright;
        $upload->height = $Height;
        $upload->width = $Width;
        $upload->date_time = $DateTime;
        $upload->file_name = $FileName;
        $upload->file_size = $FileSize;
        $upload->iso = $ISOSpeedRatings;
        $upload->focal_length = $FocalLength;
        $upload->light_source = $LightSource;
        $upload->max_aperture_value = $MaxApertureValue;
        $upload->mime_type = $MimeType;
        $upload->make = $Make;
        $upload->model = $Model;
        $upload->software = $Software;
        $upload->shutter_speed = $ShutterSpeed;

        $upload->name = $file_name;
        $upload->file_type = $extensionType;
        $upload->extension = $extension;
        $upload->orientation = "";
        $upload->size = $size;

        $upload->original = "work/campaign/".$originalFolderName.$image_name;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->campaign_id = $campaign_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        return back()->withSuccess(__('Campaign file successfully uploaded.'));
    }

    public function campaignUploadDownload($upload_id)
    {
        $uploadExists = Upload::findOrFail($upload_id);
        $upload = Upload::where('id',$upload_id)->first();
        $file_path = public_path($upload->original);
        return response()->download($file_path);
    }

    public function campaignUpdate(Request $request, $campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->name = $request->name;
        $campaign->start_date = date('Y-m-d', strtotime($request->start_date));
        $campaign->end_date = date('Y-m-d', strtotime($request->end_date));
        $campaign->campaign_type_id = $request->type;
        $campaign->expected_revenue = $request->expected_revenue;
        $campaign->budgeted_cost = $request->budgeted_cost;
        $campaign->description = $request->description;
        $campaign->user_id = Auth::user()->id;
        $campaign->save();
        return redirect()->route('admin.campaign.show',$campaign->id)->withSuccess('Campaign updated!');

    }

    public function campaignDelete($campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();

        return back()->withSuccess(__('Campaign '.$campaign->name.' successfully deleted.'));
    }

    public function campaignRestore($campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();

        return back()->withSuccess(__('Campaign '.$campaign->name.' successfully restored.'));
    }


    // contacts
    public function contacts()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get all contacts
        $contacts = Contact::where('is_lead',False)->with('status','contact_type','title')->get();
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
        // get contacts
        $contacts = Contact::with('user','status','contact_type')->get();
        // get contact types
        $contactTypes = ContactType::all();
        // get organizations
        $organizations = Organization::all();
        // get titles
        $titles = Title::all();
        // get lead sources
        $leadSources = LeadSource::all();
        // get campaigns
        $campaigns = Campaign::all();
        return view('admin.contact_create',compact('contacts','user','contactTypes','navbarValues','organizations','titles','leadSources','campaigns'));
    }

    public function contactStore(Request $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->phone_number = $request->phone_number;
        $contact->about = $request->about;
        $contact->title_id = $request->title;
        $contact->lead_source_id = $request->lead_source;
        $contact->organization_id = $request->organization;
        $contact->campaign_id = $request->campaign;

        if($request->is_lead == "on"){
            $contact->is_lead = True;
        }else{
            $contact->is_lead = False;
        }

        $contact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contact->user_id = Auth::user()->id;
        $contact->save();

        if($request->contact_types)
        {
            foreach ($request->contact_types as $contactContactTypes){
                $contactContactType = new ContactContactType();
                $contactContactType->contact_id = $contact->id;
                $contactContactType->contact_type_id = $contactContactTypes;
                $contactContactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $contactContactType->user_id = Auth::user()->id;
                $contactContactType->save();
            }
        }
        return redirect()->route('admin.contact.show',$contact->id)->withSuccess(__('Contact '.$contact->name.' successfully created.'));
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
        // contacts
        $contact = Contact::with('user','status')->where('id',$contact_id)->first();
        // contact types
        $contactTypes = ContactType::all();
        // get organizations
        $organizations = Organization::all();
        // get titles
        $titles = Title::all();
        // get lead sources
        $leadSources = LeadSource::all();
        // get campaigns
        $campaigns = Campaign::all();
        // contact designs
        $designs = Design::with('user','status')->where('contact_id',$contact_id)->get();
        // contact projects
        $projects = Project::with('user','status')->where('contact_id',$contact_id)->get();
        // contact albums
        $albums = Album::with('user','status')->where('contact_id',$contact_id)->get();
        // contact orders
        $orders = Order::with('user','status')->where('contact_id',$contact_id)->get();
        // ontact owed liability
        $liabilities = Liability::with('user','status')->where('contact_id',$contact_id)->get();
        // contact promo codes
        $assignedPromoCodes = PromoCodeAssignment::with('user','status','promo_code')->where('contact_id',$contact_id)->get();
        // contact contact types
        $contactContactTypes = ContactContactType::with('user','status','contact_type')->where('contact_id',$contact_id)->get();
        // contact deals
        $deals = Deal::with('user','status','deal_stage','lead_source')->where('contact_id',$contact_id)->get();
        // contact quotes
        $quotes = Quote::with('user','status')->where('contact_id',$contact_id)->get();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','contact')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('contact_id',$contact->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','contact')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('contact_id',$contact->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','contact')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('contact_id',$contact->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','contact')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('contact_id',$contact->id)->get();
        return view('admin.contact_show',compact('overdueToDos','completedToDos','inProgressToDos','pendingToDos','contactContactTypes','quotes','deals','assignedPromoCodes','liabilities','orders','campaigns','leadSources','titles','organizations','contact','user','designs','projects','albums','contactTypes','navbarValues','contactWorkCount'));
    }

    public function contactUpdate(Request $request, $contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->phone_number = $request->phone_number;
        $contact->about = $request->about;
        $contact->title_id = $request->title;
        $contact->lead_source_id = $request->lead_source;
        $contact->organization_id = $request->organization;
        $contact->campaign_id = $request->campaign;
        $contact->save();

        // Album tags update
        $contactTypeRequestDate =array();
        foreach ($request->contact_types as $contactTypeContacts){
            // Append to array
            $contactTypeRequestDate[]['id'] = $contactTypeContacts;

            // Check if album tag exists
            $contactTypeContact = ContactContactType::where('contact_id',$contact->id)->where('contact_type_id',$contactTypeContacts)->first();

            if($contactTypeContact === null) {
                $contactTypeContact = new ContactContactType();
                $contactTypeContact->contact_id = $contact->id;
                $contactTypeContact->contact_type_id = $contactTypeContacts;
                $contactTypeContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $contactTypeContact->user_id = Auth::user()->id;
                $contactTypeContact->save();
            }
        }

        $contactContactTypeIds = ContactContactType::where('contact_id',$contact_id)->whereNotIn('contact_type_id',$contactTypeRequestDate)->select('id')->get()->toArray();
        DB::table('contact_contact_types')->whereIn('id', $contactContactTypeIds)->delete();


        return redirect()->route('admin.contact.show',$contact->id)->withSuccess('Contact updated!');
    }

    public function contactUpdateLeadToContact($contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contact->is_lead = True;
        $contact->save();
        return redirect()->route('admin.contact.show',$contact->id)->withSuccess('Contact updated!');
    }

    public function contactContactTypeStore(Request $request, $contact_id)
    {

        $contact = Contact::findOrFail($contact_id);
        $contactContactType = new ContactContactType();
        $contactContactType->contact_id;
        $contactContactType->contact_type_id = $request->contact_type;
        $contactContactType->save();
        return redirect()->route('admin.contact.show',$contact->id)->withSuccess('Contact updated!');

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

    // organizations
    public function organizations()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $organizations = Organization::with('user','status','organization_type')->withCount('contacts')->get();
        return view('admin.organizations',compact('organizations','user','navbarValues'));

    }

    public function organizationCreate()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization types
        $organizationTypes = OrganizationType::all();
        // organizations
        $organizations = Organization::all();
        return view('admin.organization_create',compact('user','navbarValues','organizationTypes','organizations'));

    }

    public function organizationStore(Request $request)
    {
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $organization = new Organization();
        $organization->name = $request->name;
        $organization->reference = $reference;
        $organization->phone_number = $request->phone_number;
        $organization->website = $request->website;
        $organization->email = $request->email;
        $organization->organization_type_id = $request->organization_type;
        $organization->parent_organization_id = $request->parent_organization;
        $organization->street = $request->street;
        $organization->city = $request->city;
        $organization->description = $request->description;
        $organization->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $organization->user_id = Auth::user()->id;
        $organization->save();
        return redirect()->route('admin.organization.show',$organization->id)->withSuccess('Organization created!');

    }

    public function organizationShow($organization_id)
    {
        // Check if contact type exists
        $organizationExists = Organization::findOrFail($organization_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organizations
        $organizations = Organization::all();
        // get organization types
        $organizationTypes = OrganizationType::all();
        // Get organizations
        $organization = Organization::with('user','status','organization_type','contacts','deals')->withCount('contacts','deals')->where('id',$organization_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','organization')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('organization_id',$organization->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','organization')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('organization_id',$organization->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','organization')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('organization_id',$organization->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','organization')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('organization_id',$organization->id)->get();

        return view('admin.organization_show',compact('organization','organizations','user','navbarValues','organizationTypes','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function organizationUpdate(Request $request, $organization_id)
    {

        $organization = Organization::findOrFail($organization_id);
        $organization->name = $request->name;
        $organization->phone_number = $request->phone_number;
        $organization->website = $request->website;
        $organization->email = $request->email;
        $organization->organization_type_id = $request->organization_type;
        $organization->parent_organization_id = $request->parent_organization;
        $organization->street = $request->street;
        $organization->city = $request->city;
        $organization->description = $request->description;
        $organization->user_id = Auth::user()->id;
        $organization->save();
        return redirect()->route('admin.organization.show',$organization->id)->withSuccess('Organization updated!');

    }

    public function organizationDelete($organization_id)
    {

        $organization = Organization::findOrFail($organization_id);
        $organization->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $organization->user_id = Auth::user()->id;
        $organization->save();

        return back()->withSuccess(__('Organization '.$organization->name.' successfully deleted.'));
    }
    public function organizationRestore($organization_id)
    {

        $organization = Organization::findOrFail($organization_id);
        $organization->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $organization->user_id = Auth::user()->id;
        $organization->save();

        return back()->withSuccess(__('Organization '.$organization->name.' successfully restored.'));
    }


    // deals
    public function deals()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $deals = Deal::with('user','status')->get();
        return view('admin.deals',compact('deals','user','navbarValues'));

    }

    public function dealCreate()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization
        $organizations = Organization::all();
        // campaign
        $campaigns = Campaign::all();
        // contact
        $contacts = Contact::with('organization')->get();
        // lead source
        $leadSources = LeadSource::all();
        // deal stage
        $dealStages = DealStage::all();
        return view('admin.deal_create',compact('campaigns','dealStages','leadSources','contacts','organizations','user','navbarValues'));

    }

    public function dealStore(Request $request)
    {
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $deal = new Deal();
        $deal->name = $request->name;
        $deal->reference = $reference;
        $deal->amount = $request->amount;
        $deal->starting_date = date('Y-m-d', strtotime($request->starting_date));
        $deal->closing_date = date('Y-m-d', strtotime($request->closing_date));
        $deal->probability = $request->probability;
        $deal->organization_id = $request->organization;
        $deal->contact_id = $request->contact;
        $deal->lead_source_id = $request->lead_source;
        $deal->deal_stage_id = $request->deal_stage;
        $deal->campaign_id = $request->campaign;
        $deal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $deal->user_id = Auth::user()->id;
        $deal->save();
        return redirect()->route('admin.deal.show',$deal->id)->withSuccess('Deal created!');

    }

    public function dealShow($deal_id)
    {
        // Check if contact type exists
        $dealExists = Deal::findOrFail($deal_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the contact work count
        $dealWorkCount = $this->DealWorkCount($deal_id);
        // organization
        $organizations = Organization::all();
        // campaign
        $campaigns = Campaign::all();
        // contact
        $contacts = Contact::with('organization')->get();
        // lead source
        $leadSources = LeadSource::all();
        // deal stage
        $dealStages = DealStage::all();
        // Get deals
        $deal = Deal::with('user','status','organization','contact','lead_source','deal_stage','campaign')->where('id',$deal_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','deal')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('deal_id',$deal->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','deal')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('deal_id',$deal->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','deal')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('deal_id',$deal->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','deal')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('deal_id',$deal->id)->get();

        // deal designs
        $designs = Design::with('user','status')->where('deal_id',$deal_id)->get();
        // deal projects
        $projects = Project::with('user','status')->where('deal_id',$deal_id)->get();
        // deal albums
        $albums = Album::with('user','status')->where('deal_id',$deal_id)->get();
        // deal quotes
        $quotes = Quote::with('user','status')->where('deal_id',$deal_id)->get();

        return view('admin.deal_show',compact('quotes','albums','projects','designs','dealStages','leadSources','contacts','campaigns','organizations','deal','user','navbarValues','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function dealUpdate(Request $request, $deal_id)
    {

        $deal = Deal::findOrFail($deal_id);
        $deal->name = $request->name;
        $deal->amount = $request->amount;
        $deal->starting_date = $request->starting_date;
        $deal->closing_date = $request->closing_date;
        $deal->probability = $request->probability;
        $deal->organization_id = $request->organization;
        $deal->contact_id = $request->contact;
        $deal->lead_source_id = $request->lead_source;
        $deal->deal_stage_id = $request->deal_stage;
        $deal->campaign_id = $request->campaign;
        $deal->user_id = Auth::user()->id;
        $deal->save();
        return redirect()->route('admin.deal.show',$deal->id)->withSuccess('Deal updated!');

    }

    public function dealDelete($deal_id)
    {

        $deal = Deal::findOrFail($deal_id);
        $deal->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $deal->user_id = Auth::user()->id;
        $deal->save();

        return back()->withSuccess(__('Deal '.$deal->name.' successfully deleted.'));
    }
    public function dealRestore($deal_id)
    {

        $deal = Deal::findOrFail($deal_id);
        $deal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $deal->user_id = Auth::user()->id;
        $deal->save();

        return back()->withSuccess(__('Deal '.$deal->name.' successfully restored.'));
    }

}
