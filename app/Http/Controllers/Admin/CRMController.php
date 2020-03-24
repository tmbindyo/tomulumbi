<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\ActionType;
use DB;
use Auth;
use App\Deal;
use App\ToDo;
use App\Quote;
use App\Order;
use App\Album;
use App\AlbumContact;
use App\Asset;
use App\AssetAction;
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
use App\Category;
use App\Organization;
use App\Traits\UserTrait;
use App\OrganizationType;
use App\Traits\NavbarTrait;
use App\ContactContactType;
use App\DealStage;
use App\DesignContact;
use App\ExpenseAccount;
use App\Frequency;
use Illuminate\Http\Request;
use App\PromoCodeAssignment;
use App\Traits\DealWorkCountTrait;
use Illuminate\Support\Facades\File;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use App\Kit;
use App\Loan;
use App\Payment;
use App\PriceList;
use App\ProjectContact;
use App\ProjectType;
use App\PromoCode;
use App\QuoteItem;
use App\QuoteTax;
use App\Status;
use App\Tag;
use App\Tax;
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

    public function leadCreate()
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
        return view('admin.lead_create',compact('contacts','user','contactTypes','navbarValues','organizations','titles','leadSources','campaigns'));
    }

    // campaigns
    public function campaigns()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // campaigns
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
        // campaigns
        $campaigns = Campaign::with('user','status','campaign_type')->get();
        // campaign status
        $campaignStatus = Status::where('status_type_id','4e730295-3dc3-44a4-bff8-149e66a51493')->get();

        return view('admin.campaign_create',compact('user','navbarValues','campaignTypes','campaigns','campaignStatus'));

    }

    public function campaignStore(Request $request)
    {

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->start_date = date('Y-m-d', strtotime($request->start_date));
        $campaign->end_date = date('Y-m-d', strtotime($request->end_date));
        $campaign->campaign_type_id = $request->type;
        $campaign->campaign_id = $request->campaign;
        $campaign->expected_revenue = $request->expected_revenue;
        $campaign->actual_cost = 0;
        $campaign->budgeted_cost = $request->budgeted_cost;
        $campaign->description = $request->description;
        $campaign->expected_response = $request->expected_response;
        $campaign->status_id = $request->status;
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
        // campaigns
        $campaigns = Campaign::with('user','status','campaign_type')->get();
        // campaign status
        $campaignStatus = Status::where('status_type_id','4e730295-3dc3-44a4-bff8-149e66a51493')->get();
        // Get campaigns
        $campaign = Campaign::with('user','status','campaign_type','campaign_uploads','contacts','expenses','leads','organizations','to_dos','deals','campaigns','pending_to_dos','in_progress_to_dos','completed_to_dos','overdue_to_dos')->withCount('campaign_uploads','contacts','expenses','organizations','to_dos','pending_to_dos','in_progress_to_dos','completed_to_dos','overdue_to_dos')->where('id',$campaign_id)->first();
        // return $campaign;

        return view('admin.campaign_show',compact('campaign','user','navbarValues','campaignTypes','campaigns','campaignStatus'));
    }

    public function campaignContactCreate($campaign_id)
    {
        // get Campaign
        $campaign = Campaign::findOrFail($campaign_id);
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
        return view('admin.campaign_contact_create',compact('campaign','contacts','user','contactTypes','navbarValues','organizations','titles','leadSources','campaigns'));
    }

    public function campaignDealCreate($campaign_id)
    {

        // get Campaign
        $campaign = Campaign::findOrFail($campaign_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization
        $organizations = Organization::all();
        // contact
        $contacts = Contact::with('organization')->get();
        // lead source
        $leadSources = LeadSource::all();
        // deal stage
        $dealStages = DealStage::all();
        // deal status
        $dealStatus = Status::where('status_type_id','cf5d25dc-dcf1-425c-9fdc-d580a7e0b334')->get();
        return view('admin.campaign_deal_create',compact('campaign','dealStages','leadSources','contacts','organizations','user','navbarValues','dealStatus'));

    }

    public function campaignExpenseCreate($campaign_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // expense accounts
        $expenseAccounts = ExpenseAccount::all();
        // get orders
        $orders = Order::with('status')->get();
        // expense statuses
        $expenseStatuses = Status::where('status_type_id','7805a9f3-c7ca-4a09-b021-cc9b253e2810')->get();
        // get campaign
        $campaign = Campaign::where('id',$campaign_id)->first();
        // get frequencies
        $frequencies = Frequency::all();

        return view('admin.campaign_expense_create',compact('campaign','user','navbarValues','frequencies','expenseAccounts','expenseStatuses'));
    }

    public function campaignLeadCreate($campaign_id)
    {
        // get Campaign
        $campaign = Campaign::findOrFail($campaign_id);
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
        return view('admin.campaign_lead_create',compact('campaign','contacts','user','contactTypes','navbarValues','organizations','titles','leadSources','campaigns'));
    }

    public function campaignOrganizationCreate($campaign_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization types
        $organizationTypes = OrganizationType::all();
        // organizations
        $organizations = Organization::all();
        // get campaign
        $campaign = Campaign::where('id',$campaign_id)->first();
        return view('admin.campaign_organization_create',compact('campaign','user','navbarValues','organizationTypes','organizations'));

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

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->orientation = "";
        $upload->size = $size;

        $upload->original = "work/campaign/".$originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
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
        $campaign->status_id = $request->status;
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

        if($request->organization){
            $contact->is_organization = True;
        }else{
            $contact->is_organization = False;
        }
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
        $designContacts = DesignContact::with('user','status','design')->where('contact_id',$contact_id)->get();
        // contact projects
        $projectContacts = ProjectContact::with('user','status','project')->where('contact_id',$contact_id)->get();
        // contact albums
        $albumContacts = AlbumContact::with('user','status','album')->where('contact_id',$contact_id)->get();
        // contact orders
        $orders = Order::with('status','order_products','promo_code_uses','contact.organization')->withCount('order_products')->where('contact_id',$contact_id)->get();
        // ontact owed liability
        $liabilities = Liability::with('user','status')->where('contact_id',$contact_id)->get();
        // contact loans
        $loans = Loan::with('user','status')->where('contact_id',$contact_id)->get();
        // asset actions
        $assetActions = AssetAction::with('user','status')->where('contact_id',$contact_id)->get();
        // contact promo codes
        $assignedPromoCodes = PromoCodeAssignment::with('user','status','promo_code')->get();
        $assignedPromoCodes = PromoCodeAssignment::with('user','status','promo_code')->where('contact_id',$contact_id)->get();
        // contact contact types
        $contactContactTypes = ContactContactType::with('user','status','contact_type')->where('contact_id',$contact_id)->get();
        // contact deals
        $deals = Deal::with('user','status','deal_stage','lead_source')->where('contact_id',$contact_id)->get();
        return view('admin.contact_show',compact('assetActions','loans','contactContactTypes','deals','assignedPromoCodes','liabilities','orders','campaigns','leadSources','titles','organizations','contact','user','designContacts','projectContacts','albumContacts','contactTypes','navbarValues','contactWorkCount','loans'));
    }

    public function contactAssetActionCreate($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get asset
        $assets = Asset::all();
        // get kits
        $kits = Kit::all();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contact = Contact::where('id',$contact_id)->with('organization')->first();
        return view('admin.contact_asset_action_create',compact('contact','actionTypes','assets','kits','user','navbarValues'));
    }

    public function contactPromoCodeAssign($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get promo code
        $promoCodes = PromoCode::with('status','user')->get();
        // get contacts
        $contact = Contact::where('id',$contact_id)->with('organization')->first();
        return view('admin.contact_promo_code_assign',compact('promoCodes','contact','user','navbarValues'));
    }

    public function contactClientProofCreate($contact_id)
    {
        // Tags
        $tags = Tag::all();
        // Contacts
        $contact = Contact::where('id',$contact_id)->first();
        // Contacts
        $contacts = Contact::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.contact_client_proof_create',compact('user','tags','contact','contacts','navbarValues'));
    }

    public function contactDealCreate($contact_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization
        $organizations = Organization::all();
        // campaign
        $campaigns = Campaign::all();
        // get contacts
        $contacts = Contact::all();
        // contact
        $dealContact = Contact::where('id',$contact_id)->with('organization')->first();
        // lead source
        $leadSources = LeadSource::all();
        // deal stage
        $dealStages = DealStage::all();
        return view('admin.contact_deal_create',compact('contacts','campaigns','dealStages','leadSources','dealContact','organizations','user','navbarValues'));

    }

    public function contactDesignCreate($contact_id)
    {
        // get contact
        $designContact = Contact::findOrFail($contact_id);
        // get contacts
        $contacts = Contact::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Categories
        $categories = Category::all();

        return view('admin.contact_design_create',compact('contacts','user','designContact','categories','navbarValues'));
    }

    public function contactLiabilityCreate($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // get contact
        $contactLiability = Contact::where('id',$contact_id)->with('organization')->first();
        // get contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.contact_liability_create',compact('contactLiability','user','navbarValues','accounts','contacts'));
    }

    public function contactLoanCreate($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // get contacts
        $contact = Contact::with('organization')->where('id',$contact_id)->first();
        return view('admin.contact_loan_create',compact('user','navbarValues','accounts','contact'));
    }

    public function contactOrderCreate($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // products
        $priceLists = PriceList::with('product.status','sub_type','size','status')->get();
        // contacts
        $contact = Contact::where('id',$contact_id)->with('organization')->first();

        return view('admin.contact_order_create',compact('contact','priceLists','user','navbarValues'));
    }

    public function contactProjectCreate($contact_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // contact
        $contact = Contact::findOrFail($contact_id);
        $contacts = Contact::with('organization')->get();
        // project types
        $projectTypes = ProjectType::all();
        return view('admin.contact_project_create',compact('contacts','user','contact','projectTypes','navbarValues'));
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

        // contact type contacts update
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
        // organizations
        $campaigns = Campaign::all();
        return view('admin.organization_create',compact('user','navbarValues','organizationTypes','organizations','campaigns'));

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
        $organization->campaign_id = $request->campaign;
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
        $organization = Organization::with('user','status','organization_type','contacts','deals','pending_to_dos','in_progress_to_dos','completed_to_dos','overdue_to_dos')->withCount('contacts','deals','pending_to_dos','in_progress_to_dos','completed_to_dos','overdue_to_dos')->where('id',$organization_id)->first();

        return view('admin.organization_show',compact('organization','organizations','user','navbarValues','organizationTypes'));
    }

    public function organizationContactCreate($organization_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get contacts
        $contacts = Contact::with('user','status','contact_type')->get();
        // get contact types
        $contactTypes = ContactType::all();
        // get organization
        $organization = Organization::findOrFail($organization_id);
        // get titles
        $titles = Title::all();
        // get lead sources
        $leadSources = LeadSource::all();
        // get campaigns
        $campaigns = Campaign::all();
        return view('admin.organization_contact_create',compact('contacts','user','contactTypes','navbarValues','organization','titles','leadSources','campaigns'));
    }

    public function organizationDealCreate($organization_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization
        $organization = Organization::findOrFail($organization_id);
        // campaign
        $campaigns = Campaign::all();
        // contact
        $contacts = Contact::with('organization')->get();
        // lead source
        $leadSources = LeadSource::all();
        // deal stage
        $dealStages = DealStage::all();
        // deal status
        $dealStatus = Status::where('status_type_id','cf5d25dc-dcf1-425c-9fdc-d580a7e0b334')->get();
        return view('admin.organization_deal_create',compact('campaigns','dealStages','leadSources','contacts','organization','user','navbarValues','dealStatus'));

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
        // deal status
        $dealStatus = Status::where('status_type_id','cf5d25dc-dcf1-425c-9fdc-d580a7e0b334')->get();
        return view('admin.deal_create',compact('campaigns','dealStages','leadSources','contacts','organizations','user','navbarValues','dealStatus'));

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
        $deal->about = $request->about;
        $deal->status_id = $request->status;
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

        // deal designs
        $designs = Design::with('user','status')->where('deal_id',$deal_id)->get();
        // deal projects
        $projects = Project::with('user','status')->where('deal_id',$deal_id)->get();
        // deal albums
        $albums = Album::with('user','status')->where('deal_id',$deal_id)->get();
        // deal quotes
        $quotes = Quote::with('user','status')->where('deal_id',$deal_id)->get();

        return view('admin.deal_show',compact('quotes','albums','projects','designs','dealStages','leadSources','contacts','campaigns','organizations','deal','user','navbarValues'));
    }

    public function dealClientProofCreate($deal_id)
    {
        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        // deal
        $deal = Deal::findOrFail($deal_id);
        return view('admin.deal_client_proof_create',compact('deal','user','tags','contacts','navbarValues'));
    }

    public function dealDesignCreate($deal_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $contacts = Contact::all();
        // Categories
        $categories = Category::all();
        // deal
        $deal = Deal::findOrFail($deal_id);
        return view('admin.deal_design_create',compact('deal','user','contacts','categories','navbarValues'));
    }

    public function dealProjectCreate($deal_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $contacts = Contact::all();
        // project types
        $projectTypes = ProjectType::all();
        // deal
        $deal = Deal::findOrFail($deal_id);
        return view('admin.deal_project_create',compact('deal','user','contacts','projectTypes','navbarValues'));
    }

    public function dealQuoteCreate($deal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // organization
        $organizations = Organization::all();
        // get taxes
        $taxes = Tax::all();
        // contact
        $contacts = Contact::with('organization')->get();
        // deal
        $deal = Deal::findOrFail($deal_id);
        return view('admin.deal_quote_create',compact('deal','taxes','contacts','organizations','user','navbarValues'));

    }

    public function dealUpdate(Request $request, $deal_id)
    {

        $deal = Deal::findOrFail($deal_id);
        $deal->name = $request->name;
        $deal->amount = $request->amount;
        $deal->starting_date = date('Y-m-d', strtotime($request->starting_date));
        $deal->closing_date = date('Y-m-d', strtotime($request->closing_date));
        $deal->probability = $request->probability;
        $deal->organization_id = $request->organization;
        $deal->contact_id = $request->contact;
        $deal->lead_source_id = $request->lead_source;
        $deal->deal_stage_id = $request->deal_stage;
        $deal->campaign_id = $request->campaign;
        $deal->about = $request->about;
        $deal->status_id = $request->status;
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

    // quotes
    public function quotes()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $quotes = Quote::with('user','status')->get();
        return view('admin.quotes',compact('quotes','user','navbarValues'));

    }

    public function quoteCreate()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get taxes
        $taxes = Tax::all();
        // contact
        $deals = Deal::all();
        return view('admin.quote_create',compact('taxes','deals','user','navbarValues'));

    }

    public function quoteStore(Request $request)
    {
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $quote = new Quote();
        $quote->reference = $reference;
        $quote->date = date('Y-m-d', strtotime($request->date));
        $quote->due_date = date('Y-m-d', strtotime($request->due_date));

        $quote->customer_notes = $request->customer_notes;
        $quote->terms_and_conditions = $request->terms_and_conditions;

        $quote->subtotal = $request->subtotal;
        $quote->discount = $request->discount;
        $quote->total = $request->grand_total;

        $quote->tax = 0;
        $quote->balance = 0;
        $quote->paid = 0;

        if($request->is_draft == "on"){
            $quote->is_draft = True;
        }else{
            $quote->is_draft = False;
        }

        $quote->has_uploads = False;
        $quote->is_rejected = False;
        $quote->is_cancelled = False;
        $quote->is_accepted = False;

        $quote->deal_id = $request->deal;
        $quote->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $quote->user_id = Auth::user()->id;
        $quote->save();

        // Quote items
        foreach ($request->item_details as $item) {

            $quoteItem =  new QuoteItem();
            $quoteItem->product = $item['item'];
            $quoteItem->rate = $item['rate'];
            $quoteItem->quantity = $item['quantity'];
            $quoteItem->amount = $item['amount'];
            $quoteItem->quote_id = $quote->id;
            $quoteItem->is_refunded = False;
            $quoteItem->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
            $quoteItem->user_id = Auth::user()->id;
            $quoteItem->save();
        }

        $taxTotal = 0;
        // check if taxes applied
        if($request->taxes){
            // save quote taxes
            foreach ($request->taxes as $quoteTaxes){
                // get tax
                $tax = Tax::findOrFail($quoteTaxes);
                $quoteTax = new QuoteTax();
                $quoteTax->quote_id = $quote->id;
                $quoteTax->tax_id = $quoteTaxes;
                $quoteTax->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $quoteTax->user_id = Auth::user()->id;
                $quoteTax->save();

                if ($tax->is_percentage == 1){
                    // get percentage
                    $amount = doubleval($tax->amount/100) * doubleval($request->grand_total);
                    $taxTotal = $taxTotal + $amount;
                }else{
                    // add as is
                    $taxTotal = $taxTotal + $tax->amount;
                }
            }
        }

        // calculate tax and update tax amount and update total
        $quoteUpdateTax = Quote::findOrFail($quote->id);
        $quoteUpdateTax->total = $quoteUpdateTax->sub_total + $quoteUpdateTax->discount + $taxTotal;
        $quoteUpdateTax->tax = $taxTotal;
        $quoteUpdateTax->save();

        return redirect()->route('admin.quote.show',$quote->id)->withSuccess('Quote created!');

    }

    public function quoteShow($quote_id)
    {
        // Check if contact type exists
        $quoteExists = Quote::findOrFail($quote_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get taxes
        $taxes = Tax::all();
        // contact
        $contacts = Contact::with('organization')->get();

        // Get quotes
        $quote = Quote::with('user','status','campaign','deal.contact.organization','deal.organization','quote_items','payments.account','payments.status')->withCount('quote_items')->where('id',$quote_id)->first();
        // return $quote;
        // Get contact type
        $payments = Payment::with('user','status','refunds.account','asset_action','loan','order','quote')->where('quote_id',$quote->id)->get();

        return view('admin.quote_show',compact('payments','contacts','taxes','quote','user','navbarValues'));
    }

    public function quotePaymentCreate($quote_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // quotes
        $quote = Quote::findOrFail($quote_id);
        return view('admin.quote_payment_create',compact('user','navbarValues','accounts','quote'));
    }

    public function quoteEdit($quote_id)
    {
        // Check if contact type exists
        $quoteExists = Quote::findOrFail($quote_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get taxes
        $taxes = Tax::all();
        // contact
        $deals = Deal::all();

        // Get quotes
        $quote = Quote::with('user','status','campaign','deal','quote_items','quote_taxes')->withCount('quote_items')->where('id',$quote_id)->first();

        return view('admin.quote_edit',compact('deals','taxes','quote','user','navbarValues'));
    }

    public function quotePrint($quote_id)
    {
        // Check if contact type exists
        $quoteExists = Quote::findOrFail($quote_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get taxes
        $taxes = Tax::all();
        // contact
        $contacts = Contact::with('organization')->get();

        // Get quotes
        $quote = Quote::with('user','status','campaign','deal')->where('id',$quote_id)->first();

        return view('admin.quote_print',compact('contacts','taxes','quote','user','navbarValues'));
    }

    public function quoteSend($quote_id)
    {
        // Check if contact type exists
        $quoteExists = Quote::findOrFail($quote_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get taxes
        $taxes = Tax::all();
        // contact
        $contacts = Contact::with('organization')->get();

        // Get quotes
        $quote = Quote::with('user','status','contact','campaign','deal')->where('id',$quote_id)->first();

        return view('admin.quote_send',compact('contacts','taxes','quote','user','navbarValues'));
    }

    public function quoteUpdate(Request $request, $quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->date = date('Y-m-d', strtotime($request->date));
        $quote->due_date = date('Y-m-d', strtotime($request->due_date));

        $quote->customer_notes = $request->customer_notes;
        $quote->terms_and_conditions = $request->terms_and_conditions;

        $quote->subtotal = $request->subtotal;
        $quote->discount = $request->discount;
        $quote->total = $request->grand_total;

        if($request->is_draft == "on"){
            $quote->is_draft = True;
        }else{
            $quote->is_draft = False;
        }

        $quote->has_uploads = False;
        $quote->is_rejected = False;
        $quote->is_cancelled = False;
        $quote->is_accepted = False;

        $quote->deal_id = $request->deal;
        $quote->save();

        $quoteCurrentItems =array();
        // Quote items
        foreach ($request->item_details as $item) {

            $quoteItemNames[]['id'] = $item['item'];
            // check if product exists
            $product = QuoteItem::where('quote_id',$quote->id)->where('product',$item['item'])->first();

            if($product === null) {
                $quoteItem =  new QuoteItem();
                $quoteItem->product = $item['item'];
                $quoteItem->rate = $item['rate'];
                $quoteItem->quantity = $item['quantity'];
                $quoteItem->amount = $item['amount'];
                $quoteItem->quote_id = $quote->id;
                $quoteItem->is_refunded = False;
                $quoteItem->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
                $quoteItem->user_id = Auth::user()->id;
                $quoteItem->save();
            }else{
                $product->product = $item['item'];
                $product->rate = $item['rate'];
                $product->quantity = $item['quantity'];
                $product->amount = $item['amount'];
                $product->save();
            }
        }

        $quoteItemIds = QuoteItem::where('quote_id',$quote_id)->whereNotIn('product',$quoteItemNames)->select('id')->get()->toArray();
        DB::table('quote_items')->whereIn('id', $quoteItemIds)->delete();

        $taxTotal = 0;
        // check if taxes applied
        // Quote taxes update
        $quoteRequestTaxes =array();
        foreach ($request->taxes as $quoteQuoteTax){
            // Append to array
            $quoteRequestTaxes[]['id'] = $quoteQuoteTax;

            // Check if quote tax exists
            $quoteTax = QuoteTax::where('quote_id',$quote->id)->where('tax_id',$quoteQuoteTax)->first();
            if($quoteTax === null) {
                $quoteTax = new QuoteTax();
                $quoteTax->quote_id = $quote->id;
                $quoteTax->tax_id = $quoteQuoteTax;
                $quoteTax->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $quoteTax->user_id = Auth::user()->id;
                $quoteTax->save();
            }
            $tax = Tax::findOrFail($quoteQuoteTax);
            if ($tax->is_percentage == 1){
                // get percentage
                $amount = doubleval($tax->amount/100) * doubleval($request->grand_total);
                $taxTotal = $taxTotal + $amount;
            }else{
                // add as is
                $taxTotal = $taxTotal + $tax->amount;
            }
        }

        $quoteTaxesIds = QuoteTax::where('quote_id',$quote_id)->whereNotIn('tax_id',$quoteRequestTaxes)->select('id')->get()->toArray();
        DB::table('quote_taxes')->whereIn('id', $quoteTaxesIds)->delete();


        // calculate tax and update tax amount and update total
        $quoteUpdateTax = Quote::findOrFail($quote->id);
        $quoteUpdateTax->total = $request->subtotal + $request->discount + $taxTotal;
        $quoteUpdateTax->tax = $taxTotal;
        $quoteUpdateTax->save();

        return redirect()->route('admin.quote.show',$quote->id)->withSuccess('Quote updated!');

    }

    public function quoteDelete($quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $quote->user_id = Auth::user()->id;
        $quote->save();

        return back()->withSuccess(__('Quote '.$quote->name.' successfully deleted.'));
    }

    public function quoteAccepted($quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->is_accepted = True;
        $quote->user_id = Auth::user()->id;
        $quote->save();

        return back()->withSuccess(__('Quote '.$quote->name.' successfully marked as accepted.'));
    }

    public function quoteRejected($quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->is_rejected = True;
        $quote->user_id = Auth::user()->id;
        $quote->save();

        return back()->withSuccess(__('Quote '.$quote->name.' successfully marked as rejected.'));
    }

    public function quoteCancelled($quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->is_cancelled = True;
        $quote->user_id = Auth::user()->id;
        $quote->save();

        return back()->withSuccess(__('Quote '.$quote->name.' successfully marked as cancelled.'));
    }

    public function quoteRestore($quote_id)
    {

        $quote = Quote::findOrFail($quote_id);
        $quote->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $quote->user_id = Auth::user()->id;
        $quote->save();

        return back()->withSuccess(__('Quote '.$quote->name.' successfully restored.'));
    }

}
