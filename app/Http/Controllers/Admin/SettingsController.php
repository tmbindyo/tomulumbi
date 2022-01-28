<?php

namespace App\Http\Controllers\Admin;


use App\LetterLetterTag;
use Auth;
use App\Tag;
use App\Size;
use App\Deal;
use App\Type;
use App\Label;
use App\Title;
use App\Album;
use App\Status;
use App\Tudeme;
use App\Upload;
use App\Design;
use App\Project;
use App\SubType;
use App\Contact;
use App\Journal;
use App\Campaign;
use App\Category;
use App\AlbumSet;
use App\AlbumTag;
use App\LetterTag;
use App\Frequency;
use App\AlbumType;
use App\LeadSource;
use App\ActionType;
use App\ContactType;
use App\AssetAction;
use App\Organization;
use App\ProjectType;
use App\CampaignType;
use App\AlbumCategory;
use App\Asset;
use App\AssetCategory;
use App\ThumbnailSize;
use App\ExpenseAccount;
use App\Traits\UserTrait;
use App\OrganizationType;
use Illuminate\Http\File;
use App\Traits\NavbarTrait;
use App\ContactContactType;
use App\CookingSkill;
use App\CookingStyle;
use App\Course;
use App\Cuisine;
use App\DietaryPreference;
use App\DishType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kit;
use App\Meal;
use App\MealCookingStyle;
use App\MealCourse;
use App\MealDietaryPreference;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\TudemeTag;
use App\TudemeTudemeTag;
use App\TudemeTudemeType;
use App\TudemeType;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingsController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use DocumentExtensionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // settings
    public function settings()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get album types
        $albumTypes = AlbumType::with('user','status')->get();
        // get action types
        $actionTypes = ActionType::with('user','status')->get();
        // get album types
        $albumTags = Tag::with('user','status','thumbnail_size')->get();
        // get asset categories
        $assetCategories = AssetCategory::with('user','status')->get();
        // get design categories
        $categories = Category::with('user','status')->get();
        // get dietary preferences
        $dietaryPreferences = DietaryPreference::with('user','status')->get();
        // get campaign types
        $campaignTypes = CampaignType::with('user','status')->get();
        // get contact types
        $contactTypes = ContactType::with('user','status')->get();
        // get cooking skills
        $cookingSkills = CookingSkill::with('user','status')->get();
        // get cooking style
        $cookingStyles = CookingStyle::with('user','status')->get();
        // get cuisines
        $cuisines = Cuisine::with('user','status')->get();
        // get courses
        $courses = Course::with('user','status')->get();
        // get dish types
        $dishTypes = DishType::with('user','status')->get();
        // get expense accounts
        $expenseAccounts = ExpenseAccount::with('user','status')->get();
        // get frequencies
        $frequencies = Frequency::with('user')->get();
        // get labels
        $labels = Label::with('user','status')->get();
        // get lead sources
        $leadSources = LeadSource::with('user','status')->get();
        // get letter tags
        $letterTags = LetterTag::with('user','status')->get();
        // get organization types
        $organizationTypes = OrganizationType::with('user','status')->get();
        // get project types
        $projectTypes = ProjectType::with('user','status')->get();
        // get sizes
        $sizes = Size::with('user','status','type')->get();
        // get sub types
        $subTypes = SubType::with('user','status','type')->get();
        // get types
        $types = Type::all();
        // get titles
        $titles = Title::with('user','status')->get();
        // get tudeme types
        $tudemeTypes = TudemeType::with('user','status')->get();
        // get tudeme tags
        $tudemeTags = TudemeTag::with('user','status')->get();
        // thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();


        return view('admin.settings.settings',compact('user','navbarValues', 'albumTypes', 'albumTags', 'actionTypes', 'assetCategories', 'categories', 'dietaryPreferences', 'campaignTypes', 'contactTypes', 'cookingSkills', 'cookingStyles', 'cuisines', 'courses', 'dishTypes', 'expenseAccounts', 'frequencies', 'labels', 'leadSources', 'letterTags', 'organizationTypes', 'projectTypes', 'sizes', 'subTypes', 'types', 'titles', 'tudemeTypes', 'tudemeTags', 'thumbnailSizes'));
    }





    // action type functions
    public function actionTypeStore(Request $request)
    {

        $actionType = new ActionType();
        $actionType->name = $request->name;
        $actionType->description = $request->description;
        $actionType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $actionType->user_id = Auth::user()->id;
        $actionType->save();

        return redirect()->route('admin.action.type.show',$actionType->id)->withSuccess('Action type updated!');
    }

    public function actionTypeShow($action_type_id)
    {
        // Check if action type exists
        $actionTypeExists = ActionType::findOrFail($action_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        // get asset
        $assets = Asset::all();
        // action type
        $actionType = ActionType::with('user','status')->withCount('asset_actions')->where('id',$action_type_id)->first();
        // action type actions
        $actionTypeAssetActions = AssetAction::with('contact','user','status','asset','kit')->where('action_type_id',$action_type_id)->get();
        return view('admin.settings.action_type_show',compact('actionType','user','actionTypeAssetActions','navbarValues', 'actionTypes', 'contacts', 'assets', 'actionTypeExists'));
    }

    public function actionTypeAssetActionCreate($action_type_id)
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
        $actionType = ActionType::findOrFail($action_type_id);
        // contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.settings.action_type_asset_action_create',compact('kits','contacts','actionType','assets','user','navbarValues'));
    }

    public function actionTypeUpdate(Request $request, $action_type_id)
    {

        $actionType = ActionType::findOrFail($action_type_id);
        $actionType->name = $request->name;
        $actionType->description = $request->description;
        $actionType->user_id = Auth::user()->id;
        $actionType->save();

        return redirect()->route('admin.action.type.show',$action_type_id)->withSuccess('Action type '. $actionType->name .' updated!');
    }

    public function actionTypeDelete($action_type_id)
    {

        $actionType = ActionType::findOrFail($action_type_id);
        $actionType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $actionType->user_id = Auth::user()->id;
        $actionType->save();

        return back()->withSuccess(__('Action type '.$actionType->name.' successfully deleted.'));
    }

    public function actionTypeRestore($action_type_id)
    {

        $actionType = ActionType::findOrFail($action_type_id);
        $actionType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $actionType->user_id = Auth::user()->id;
        $actionType->save();

        return back()->withSuccess(__('Action type '.$actionType->name.' successfully restored.'));
    }


    // album type functions
    public function albumTypeStore(Request $request)
    {

        $albumType = new AlbumType();
        $albumType->name = $request->name;
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return redirect()->route('admin.album.type.show',$albumType->id)->withSuccess('Album type updated!');
    }

    public function albumTypeShow($album_type_id)
    {
        // Check if album type exists
        $albumTypeExists = AlbumType::findOrFail($album_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Projects
        $projects = Project::all();
        // Design
        $designs = Design::all();
        // Tudeme
        $tudemes = Tudeme::all();
        // Deals
        $deals = Deal::all();
        // album type
        $albumType = AlbumType::with('user','status','albums.status')->where('id',$album_type_id)->withCount('albums')->first();
        // album type albums
        $albumTypeAlbums = Album::with('user','status')->where('album_type_id',$album_type_id)->withCount('album_views')->get();
        return view('admin.settings.album_type_show',compact('albumType','user','albumTypeAlbums','navbarValues', 'tags', 'contacts', 'projects', 'designs', 'tudemes', 'deals'));
    }

    public function albumTypeUpdate(Request $request, $album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->name = $request->name;
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return redirect()->route('admin.album.type.show',$album_type_id)->withSuccess('Album type '. $albumType->name .' updated!');
    }

    public function albumTypeDelete($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return back()->withSuccess(__('Album type '.$albumType->name.' successfully deleted.'));
    }

    public function albumTypeRestore($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return back()->withSuccess(__('Album type '.$albumType->name.' successfully restored.'));
    }


    // asset categories
    public function assetCategoryStore(Request $request)
    {
        $category = new AssetCategory();
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->route('admin.asset.category.show',$category->id)->withSuccess(__('Asset category '.$category->name.' successfully created.'));
    }

    public function assetCategoryShow($asset_category_id)
    {
        // Check if category exists
        $assetCategoryExists = AssetCategory::findOrFail($asset_category_id);
        // User
        $user = $this->getAdmin();
        // asset categories
        $assetCategories = AssetCategory::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $assetCategory = AssetCategory::with('user','status','assets.asset_category')->where('id',$asset_category_id)->withCount('assets')->first();
        return view('admin.settings.asset_category_show',compact('assetCategory','user','navbarValues', 'assetCategories', 'assetCategoryExists'));
    }

    public function assetCategoryUpdate(Request $request, $asset_category_id)
    {

        $assetCategory = AssetCategory::findOrFail($asset_category_id);
        $assetCategory->name = mb_strtolower($request->name);
        $assetCategory->user_id = Auth::user()->id;
        $assetCategory->save();

        return redirect()->route('admin.asset.category.show',$assetCategory->id)->withSuccess('Asset category updated!');
    }

    public function assetCategoryDelete($asset_category_id)
    {

        $assetCategory = AssetCategory::findOrFail($asset_category_id);
        $assetCategory->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $assetCategory->user_id = Auth::user()->id;
        $assetCategory->save();

        return back()->withSuccess(__('Asset category '.$assetCategory->name.' successfully deleted.'));
    }

    public function assetCategoryRestore($asset_category_id)
    {

        $assetCategory = AssetCategory::findOrFail($asset_category_id);
        $assetCategory->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $assetCategory->user_id = Auth::user()->id;
        $assetCategory->save();

        return back()->withSuccess(__('Asset category '.$assetCategory->name.' successfully restored.'));
    }


    // categories
    public function categoryStore(Request $request)
    {
        $category = new Category();
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->route('admin.category.show',$category->id)->withSuccess(__('Category '.$category->name.' successfully created.'));
    }

    public function categoryShow($category_id)
    {
        // Check if category exists
        $categoryExists = Category::findOrFail($category_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Contacts
        $contacts = Contact::all();
        // Categories
        $categories = Category::all();
        $category = Category::with('user','status','design_categories.design.status')->where('id',$category_id)->withCount('design_categories')->first();
        return view('admin.settings.category_show',compact('category','user','navbarValues' , 'contacts', 'categories', 'categoryExists'));
    }

    public function categoryUpdate(Request $request, $category_id)
    {

        $category = Category::findOrFail($category_id);
        $category->name = mb_strtolower($request->name);
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('admin.category.show',$category->id)->withSuccess('Category updated!');
    }

    public function categoryDelete($category_id)
    {

        $category = Category::findOrFail($category_id);
        $category->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withSuccess(__('Category '.$category->name.' successfully deleted.'));
    }

    public function categoryRestore($category_id)
    {

        $category = Category::findOrFail($category_id);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withSuccess(__('Category '.$category->name.' successfully restored.'));
    }


    // campaign types
    public function campaignTypeStore(Request $request)
    {
        $campaignType = new CampaignType();
        $campaignType->name = $request->name;
        $campaignType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaignType->user_id = Auth::user()->id;
        $campaignType->save();

        return redirect()->route('admin.campaign.type.show',$campaignType->id)->withSuccess('Campaign type updated!');
    }

    public function campaignTypeShow($campaign_type_id)
    {
        // Check if campaign type exists
        $campaignTypeExists = CampaignType::findOrFail($campaign_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // campaigns
        $campaignTypes = CampaignType::with('user','status')->get();
        // campaigns
        $campaigns = Campaign::with('user','status','campaign_type')->get();
        // campaign status
        $campaignStatus = Status::where('status_type_id','4e730295-3dc3-44a4-bff8-149e66a51493')->get();
        // Get campaign type
        $campaignType = CampaignType::with('user','status','campaigns.user')->where('id',$campaign_type_id)->withCount('campaigns')->first();
        return view('admin.settings.campaign_type_show',compact('campaignType','user','navbarValues', 'campaigns', 'campaignTypeExists', 'campaignTypes', 'campaigns', 'campaignStatus'));
    }

    public function campaignTypeUpdate(Request $request, $campaign_type_id)
    {

        $campaignType = CampaignType::findOrFail($campaign_type_id);
        $campaignType->name = $request->name;
        $campaignType->save();

        return redirect()->route('admin.campaign.type.show',$campaignType->id)->withSuccess('Campaign type updated!');
    }

    public function campaignTypeDelete($campaign_type_id)
    {

        $campaignType = CampaignType::findOrFail($campaign_type_id);
        $campaignType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $campaignType->user_id = Auth::user()->id;
        $campaignType->save();

        return back()->withSuccess(__('Campaign type '.$campaignType->name.' successfully deleted.'));
    }
    public function campaignTypeRestore($campaign_type_id)
    {

        $campaignType = CampaignType::findOrFail($campaign_type_id);
        $campaignType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaignType->user_id = Auth::user()->id;
        $campaignType->save();

        return back()->withSuccess(__('Campaign type '.$campaignType->name.' successfully restored.'));
    }


    // contact types
    public function contactTypeStore(Request $request)
    {
        $contactType = new ContactType();
        $contactType->name = $request->name;
        $contactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return redirect()->route('admin.contact.type.show',$contactType->id)->withSuccess('Contact type created!');
    }

    public function contactTypeShow($contact_type_id)
    {
        // Check if contact type exists
        $contactTypeExists = ContactType::findOrFail($contact_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get organizations
        $organizations = Organization::all();
        // get contact types
        $contactTypes = ContactType::all();
        // get campaigns
        $campaigns = Campaign::all();
        // get lead sources
        $leadSources = LeadSource::all();
        // Get contact type
        $contactType = ContactType::with('user','status')->where('id',$contact_type_id)->withCount('contact_type_contacts')->first();
        $contactContactTypes = ContactContactType::with('user','status','contact')->where('contact_type_id',$contact_type_id)->get();
        return view('admin.settings.contact_type_show',compact('contactType','user','contactContactTypes','navbarValues', 'organizations', 'contactTypeExists', 'contactTypes', 'campaigns', 'leadSources'));
    }

    public function contactTypeUpdate(Request $request, $contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->name = $request->name;
        $contactType->save();

        return redirect()->route('admin.contact.type.show',$contactType->id)->withSuccess('Contact type updated!');
    }

    public function contactTypeDelete($contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return back()->withSuccess(__('Contact type '.$contactType->name.' successfully deleted.'));
    }
    public function contactTypeRestore($contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return back()->withSuccess(__('Contact type '.$contactType->name.' successfully restored.'));
    }


    // expense accounts
    public function expenseAccountStore(Request $request)
    {
        $expenseAccount = new ExpenseAccount();
        $expenseAccount->name = $request->name;
        $expenseAccount->description = $request->description;
        $expenseAccount->code = $request->code;
        $expenseAccount->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $expenseAccount->user_id = Auth::user()->id;
        $expenseAccount->save();

        return redirect()->route('admin.expense.account.show',$expenseAccount->id)->withSuccess('Expense account created!');
    }

    public function expenseAccountShow($expense_account_id)
    {
        // Check if contact type exists
        $expenseAccountExists = ExpenseAccount::findOrFail($expense_account_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $expenseAccount = ExpenseAccount::with('user','status','expenses')->where('id',$expense_account_id)->withCount('expenses')->first();
        return view('admin.settings.expense_account_show',compact('expenseAccount','user','navbarValues'));
    }

    public function expenseAccountUpdate(Request $request, $expense_account_id)
    {

        $expenseAccount = ExpenseAccount::findOrFail($expense_account_id);
        $expenseAccount->name = $request->name;
        $expenseAccount->description = $request->description;
        $expenseAccount->code = $request->code;
        $expenseAccount->save();

        return redirect()->route('admin.expense.account.show',$expenseAccount->id)->withSuccess('Expense account updated!');
    }

    public function expenseAccountDelete($expense_account_id)
    {

        $expenseAccount = ExpenseAccount::findOrFail($expense_account_id);
        $expenseAccount->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $expenseAccount->user_id = Auth::user()->id;
        $expenseAccount->save();

        return back()->withSuccess(__('Expense account '.$expenseAccount->name.' successfully deleted.'));
    }
    public function expenseAccountRestore($expense_account_id)
    {

        $expenseAccount = ExpenseAccount::findOrFail($expense_account_id);
        $expenseAccount->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $expenseAccount->user_id = Auth::user()->id;
        $expenseAccount->save();

        return back()->withSuccess(__('Expense account '.$expenseAccount->name.' successfully restored.'));
    }


    // frequency
    public function frequencyStore(Request $request)
    {
        $frequency = new Frequency();
        $frequency->name = $request->name;
        $frequency->type = $request->type;
        $frequency->frequency = $request->frequency;
        $frequency->user_id = Auth::user()->id;
        $frequency->save();

        return redirect()->route('admin.frequency.show',$frequency->id)->withSuccess('Frequency created!');
    }

    public function frequencyShow($Frequency_id)
    {
        // Check if contact type exists
        $frequencyExists = Frequency::findOrFail($Frequency_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $frequency = Frequency::with('user','expenses')->where('id',$Frequency_id)->withCount('expenses')->first();
        return view('admin.settings.frequency_show',compact('frequency','user','navbarValues'));
    }

    public function frequencyUpdate(Request $request, $Frequency_id)
    {

        $frequency = Frequency::findOrFail($Frequency_id);
        $frequency->name = $request->name;
        $frequency->type = $request->type;
        $frequency->frequency = $request->frequency;
        $frequency->user_id = Auth::user()->id;
        $frequency->save();

        return redirect()->route('admin.frequency.show',$frequency->id)->withSuccess('Frequency updated!');
    }

    public function frequencyDelete($Frequency_id)
    {

        $frequency = Frequency::findOrFail($Frequency_id);
        $frequency->delete();

        return back()->withSuccess(__('Frequeny '.$frequency->name.' successfully deleted.'));
    }
    public function frequencyRestore($Frequency_id)
    {

        $frequency = Frequency::findOrFail($Frequency_id);
        $frequency->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $frequency->user_id = Auth::user()->id;
        $frequency->save();

        return back()->withSuccess(__('Frequeny '.$frequency->name.' successfully restored.'));
    }


    // labels
    public function labelStore(Request $request)
    {
        $label = new Label();
        $label->name = $request->name;

        if($request->is_tudeme == "on"){
            $label->is_tudeme = True;
        }else{
            $label->is_tudeme = False;
        }

        $label->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $label->user_id = Auth::user()->id;
        $label->save();

        return redirect()->route('admin.label.show',$label->id)->withSuccess('Label created!');
    }

    public function labelShow($label_id)
    {
        // Check if contact type exists
        $labelExists = Label::findOrFail($label_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $label = Label::with('user','status','journal_labels.journal')->where('id',$label_id)->withCount('journal_labels')->first();
        return view('admin.settings.label_show',compact('label','user','navbarValues'));
    }

    public function labelUpdate(Request $request, $label_id)
    {

        $label = Label::findOrFail($label_id);
        $label->name = $request->name;
        if($request->is_tudeme == "on"){
            $label->is_tudeme = True;
        }else{
            $label->is_tudeme = False;
        }
        $label->save();

        return redirect()->route('admin.label.show',$label->id)->withSuccess('Label updated!');
    }

    public function labelDelete($label_id)
    {

        $label = Label::findOrFail($label_id);
        $label->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $label->user_id = Auth::user()->id;
        $label->save();

        return back()->withSuccess(__('Label '.$label->name.' successfully deleted.'));
    }
    public function labelRestore($label_id)
    {

        $label = Label::findOrFail($label_id);
        $label->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $label->user_id = Auth::user()->id;
        $label->save();

        return back()->withSuccess(__('Label '.$label->name.' successfully restored.'));
    }


    // lead sources
    public function leadSourceStore(Request $request)
    {
        $leadSource = new LeadSource();
        $leadSource->name = $request->name;
        $leadSource->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $leadSource->user_id = Auth::user()->id;
        $leadSource->save();

        return redirect()->route('admin.lead.source.show',$leadSource->id)->withSuccess('Expense account created!');
    }

    public function leadSourceShow($lead_source_id)
    {
        // Check if contact type exists
        $leadSourceExists = LeadSource::findOrFail($lead_source_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $leadSource = LeadSource::with('user','status','contacts','deals')->where('id',$lead_source_id)->withCount('contacts','deals')->first();
        return view('admin.settings.lead_source_show',compact('leadSource','user','navbarValues'));
    }

    public function leadSourceUpdate(Request $request, $lead_source_id)
    {

        $leadSource = LeadSource::findOrFail($lead_source_id);
        $leadSource->name = $request->name;
        $leadSource->save();

        return redirect()->route('admin.lead.source.show',$leadSource->id)->withSuccess('Expense account updated!');
    }

    public function leadSourceDelete($lead_source_id)
    {

        $leadSource = LeadSource::findOrFail($lead_source_id);
        $leadSource->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $leadSource->user_id = Auth::user()->id;
        $leadSource->save();

        return back()->withSuccess(__('Lead source '.$leadSource->name.' successfully deleted.'));
    }
    public function leadSourceRestore($lead_source_id)
    {

        $leadSource = LeadSource::findOrFail($lead_source_id);
        $leadSource->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $leadSource->user_id = Auth::user()->id;
        $leadSource->save();

        return back()->withSuccess(__('Lead source '.$leadSource->name.' successfully restored.'));
    }


    // organization types
    public function organizationTypeStore(Request $request)
    {

        $organizationType = new OrganizationType();
        $organizationType->name = $request->name;
        $organizationType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $organizationType->user_id = Auth::user()->id;
        $organizationType->save();
        return redirect()->route('admin.organization.type.show',$organizationType->id)->withSuccess('Organization type '.$organizationType->name.' created!');
    }

    public function organizationTypeShow($organization_type_id)
    {
        // Check if organization type exists
        $organizationTypeExists = OrganizationType::findOrFail($organization_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $organizationType = OrganizationType::with('user','status','organizations')->withCount('organizations')->where('id',$organization_type_id)->first();
        return view('admin.settings.organization_type_show',compact('organizationType','user','navbarValues'));
    }

    public function organizationTypeUpdate(Request $request, $organization_type_id)
    {

        $organizationType = OrganizationType::findOrFail($organization_type_id);
        $organizationType->name = $request->name;
        $organizationType->user_id = Auth::user()->id;
        $organizationType->save();

        return redirect()->route('admin.organization.type.show',$organizationType->id)->withSuccess('Organization type updated!');
    }

    public function organizationTypeDelete($organization_type_id)
    {

        $organizationType = OrganizationType::findOrFail($organization_type_id);
        $organizationType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $organizationType->user_id = Auth::user()->id;
        $organizationType->save();

        return back()->withSuccess(__('Organization type '.$organizationType->name.' successfully deleted.'));
    }

    public function organizationTypeRestore($organization_type_id)
    {

        $organizationType = OrganizationType::findOrFail($organization_type_id);
        $organizationType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $organizationType->user_id = Auth::user()->id;
        $organizationType->save();

        return back()->withSuccess(__('Organization type '.$organizationType->name.' successfully restored.'));
    }



    // project types
    public function projectTypeStore(Request $request)
    {

        $projectType = new ProjectType();
        $projectType->name = $request->name;
        $projectType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();
        return redirect()->route('admin.project.type.show',$projectType->id)->withSuccess('Project type '.$projectType->name.' created!');
    }

    public function projectTypeShow($project_type_id)
    {
        // Check if project type exists
        $projectTypeExists = ProjectType::findOrFail($project_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $projectType = ProjectType::with('user','status')->where('id',$project_type_id)->first();
        $projectTypeProjects = Project::with('user','status')->where('project_type_id',$project_type_id)->get();
        return view('admin.settings.project_type_show',compact('projectType','user','projectTypeProjects','navbarValues'));
    }

    public function projectTypeUpdate(Request $request, $project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->name = $request->name;
        $projectType->description = $request->description;
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return redirect()->route('admin.project.type.show',$projectType->id)->withSuccess('Project type updated!');
    }

    public function projectTypeDelete($project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return back()->withSuccess(__('Project type '.$projectType->name.' successfully deleted.'));
    }

    public function projectTypeRestore($project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return back()->withSuccess(__('Project type '.$projectType->name.' successfully restored.'));
    }


    // sizes
    public function sizeStore(Request $request)
    {
        $size = new Size();
        $size->size = ($request->size);
        $size->type_id = $request->type;
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();
        return redirect()->route('admin.settings')->withSuccess(__('Size '.$size->name.' successfully created.'));
    }

    public function sizeShow($size_id)
    {
        // Check if size exists
        $sizeExists = Size::findOrFail($size_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        $size = Size::with('user','status')->where('id',$size_id)->with('price_lists')->withCount('price_lists')->first();
        // get types
        $types = Type::all();

        return view('admin.settings.size_show',compact('types','size','user','navbarValues'));
    }

    public function sizeUpdate(Request $request, $size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->size = ($request->size);
        $size->type_id = $request->type;
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();

        return redirect()->route('admin.size.show',$size->id)->withSuccess('Size updated!');
    }

    public function sizeDelete($size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $size->user_id = Auth::user()->id;
        $size->save();

        return back()->withSuccess(__('Size '.$size->name.' successfully deleted.'));
    }

    public function sizeRestore($size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();

        return back()->withSuccess(__('Size '.$size->name.' successfully restored.'));
    }


    // Sub types
    public function subTypeStore(Request $request)
    {
        $subType = new SubType();
        $subType->name = mb_strtolower($request->name);
        $subType->description = $request->description;
        $subType->type_id = $request->type;
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();
        return redirect()->route('admin.sub.type.show',$subType->id)->withSuccess(__('Sub type '.$subType->name.' successfully created.'));
    }

    public function subTypeShow($sub_type_id)
    {
        // Check if type exists
        $subTypeExists = SubType::findOrFail($sub_type_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // types
        $types = Type::all();
        // User
        $user = $this->getAdmin();
        $subType = SubType::with('user','status')->where('id',$sub_type_id)->with('type','price_lists.product')->withCount('price_lists')->first();
        return view('admin.settings.sub_type_show',compact('subType','user','types','navbarValues'));
    }

    public function subTypeUpdate(Request $request, $sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->name = mb_strtolower($request->name);
        $subType->description = $request->description;
        $subType->type_id = $request->type;
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return redirect()->route('admin.sub.type.show',$subType->id)->withSuccess('Sub Type updated!');
    }

    public function subTypeDelete($sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return back()->withSuccess(__('Type '.$subType->name.' successfully deleted.'));
    }

    public function subTypeRestore($sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return back()->withSuccess(__('Type '.$subType->name.' successfully restored.'));
    }


    // tags
    public function tagStore(Request $request)
    {
        $tag = new Tag();
        $tag->name = strtolower($request->name);
        $tag->thumbnail_size_id = $request->thumbnail_size;
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();
        return redirect()->route('admin.settings')->withSuccess(__('Tag successfully created.'));
    }

    public function tagShow($tag_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Check if tag exists
        $tagExists = Tag::findOrFail($tag_id);
        $tag = Tag::with('user','status')->where('id',$tag_id)->first();
        // Tags
        $tags = Tag::all();
        // Projects
        $projects = Project::all();
        // Design
        $designs = Design::all();
        // Tudeme
        $tudemes = Tudeme::all();
        // Deals
        $deals = Deal::all();
        // Contacts
        $contacts = Contact::all();
        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // Get albums
        $albums = AlbumTag::where('tag_id',$tag_id)->select('album_id')->get()->toArray();
        // Get albums
        $tagAlbums = Album::whereIn('id', $albums)->with('user','status','album_type')->get();

        return view('admin.settings.tag_show',compact('tag','user','tagAlbums','thumbnailSizes','navbarValues', 'tags', 'projects', 'designs', 'tudemes', 'deals', 'contacts', 'tagExists'));
    }

    public function tagUpdate(Request $request, $album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->name = mb_strtolower($request->name);
        $tag->thumbnail_size_id = $request->thumbnail_size;
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function tagCoverImageUpload(Request $request,$tag_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $tag = Tag::where('id',$tag_id)->first();
        $folderName = str_replace(' ', '', $tag->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/tag/".$folderName, $file_name_extension);
        $path = public_path()."/tag/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "tag/".$folderName.$file_name;
        $upload->small_thumbnail = "tag/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "tag/".$folderName.$large_thumbnail;
        $upload->banner = "tag/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $tag = Tag::findOrFail($tag_id);
        $tag->cover_image_id = $upload->id;
        $tag->user_id = Auth::user()->id;
        $tag->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function tagDelete($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withSuccess(__('Tag '.$tag->name.' successfully deleted.'));
    }

    public function tagRestore($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withSuccess(__('Tag '.$tag->name.' successfully restored.'));
    }


    // titles
    public function titleStore(Request $request)
    {
        $title = new Title();
        $title->name = ($request->name);
        $title->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $title->user_id = Auth::user()->id;
        $title->save();
        return redirect()->route('admin.title.show',$title->id)->withSuccess(__('Title successfully created.'));
    }

    public function titleShow($title_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Check if title exists
        $titleExists = Title::findOrFail($title_id);
        $title = Title::with('user','status','contacts')->withCount('contacts')->where('id',$title_id)->first();

        return view('admin.settings.title_show',compact('title','user','navbarValues'));
    }

    public function titleUpdate(Request $request, $title_id)
    {

        $title = Title::findOrFail($title_id);
        $title->name = ($request->name);
        $title->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $title->user_id = Auth::user()->id;
        $title->save();

        return redirect()->route('admin.title.show',$title->id)->withSuccess('Title updated!');
    }

    public function titleDelete($title_id)
    {

        $title = Title::findOrFail($title_id);
        $title->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $title->user_id = Auth::user()->id;
        $title->save();

        return back()->withSuccess(__('Title '.$title->name.' successfully deleted.'));
    }

    public function titleRestore($title_id)
    {

        $title = Title::findOrFail($title_id);
        $title->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $title->user_id = Auth::user()->id;
        $title->save();

        return back()->withSuccess(__('Title '.$title->name.' successfully restored.'));
    }



    public function typeStore(Request $request)
    {
        $type = new Type();
        $type->name = mb_strtolower($request->name);
        $type->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $type->user_id = Auth::user()->id;
        $type->save();
        return redirect()->route('admin.type.show',$type->id)->withSuccess(__('Type '.$type->name.' successfully created.'));
    }

    public function typeShow($type_id)
    {
        // Check if type exists
        $typeExists = Type::findOrFail($type_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        $type = Type::with('user','status')->where('id',$type_id)->with('sub_types')->first();

        return view('admin.settings.type_show',compact('type','user','navbarValues'));
    }

    public function typeUpdate(Request $request, $type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->name = mb_strtolower($request->name);
        $type->user_id = Auth::user()->id;
        $type->save();

        return redirect()->route('admin.type.show',$type->id)->withSuccess('Type updated!');
    }

    public function typeDelete($type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $type->user_id = Auth::user()->id;
        $type->save();

        return back()->withSuccess(__('Type '.$type->name.' successfully deleted.'));
    }

    public function typeRestore($type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $type->user_id = Auth::user()->id;
        $type->save();

        return back()->withSuccess(__('Type '.$type->name.' successfully restored.'));
    }



    // cooking skill functions
    public function cookingSkillStore(Request $request)
    {

        $cookingSkill = new CookingSkill();
        $cookingSkill->name = $request->name;
        $cookingSkill->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cookingSkill->user_id = Auth::user()->id;
        $cookingSkill->save();

        return redirect()->route('admin.cooking.skill.show',$cookingSkill->id)->withSuccess('Cooking skill updated!');
    }

    public function cookingSkillShow($cooking_skill_id)
    {
        // Check if album type exists
        $cookingSkillExists = CookingSkill::findOrFail($cooking_skill_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // cooking skill
        $cookingSkill = CookingSkill::with('user','status')->where('id',$cooking_skill_id)->withCount('meals')->first();
        // cooking skill meal
        $cookingSkillMeals = Meal::with('user','status','tudeme')->where('cooking_skill_id',$cooking_skill_id)->get();
        return view('admin.settings.cooking_skill_show',compact('cookingSkill','user','cookingSkillMeals','navbarValues'));
    }

    public function cookingSkillCoverImageUpload(Request $request,$cooking_skill_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $cookingSkill = CookingSkill::where('id',$cooking_skill_id)->first();
        $folderName = str_replace(' ', '', $cookingSkill->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/cooking_skill/".$folderName, $file_name_extension);
        $path = public_path()."/cooking_skill/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/cooking_skill/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_skill/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "cooking_skill/".$folderName.$file_name;
        $upload->small_thumbnail = "cooking_skill/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "cooking_skill/".$folderName.$large_thumbnail;
        $upload->banner = "cooking_skill/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $cookingSkill = CookingSkill::findOrFail($cooking_skill_id);
        $cookingSkill->cover_image_id = $upload->id;
        $cookingSkill->user_id = Auth::user()->id;
        $cookingSkill->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function cookingSkillUpdate(Request $request, $cooking_skill_id)
    {

        $cookingSkill = CookingSkill::findOrFail($cooking_skill_id);
        $cookingSkill->name = $request->name;
        $cookingSkill->user_id = Auth::user()->id;
        $cookingSkill->save();

        return redirect()->route('admin.cooking.skill.show',$cooking_skill_id)->withSuccess('Cooking skill '. $cookingSkill->name .' updated!');
    }

    public function cookingSkillDelete($cooking_skill_id)
    {

        $cookingSkill = CookingSkill::findOrFail($cooking_skill_id);
        $cookingSkill->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $cookingSkill->user_id = Auth::user()->id;
        $cookingSkill->save();

        return back()->withSuccess(__('Cooking skill '.$cookingSkill->name.' successfully deleted.'));
    }

    public function cookingSkillRestore($cooking_skill_id)
    {

        $cookingSkill = CookingSkill::findOrFail($cooking_skill_id);
        $cookingSkill->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cookingSkill->user_id = Auth::user()->id;
        $cookingSkill->save();

        return back()->withSuccess(__('Cooking skill '.$cookingSkill->name.' successfully restored.'));
    }


    // cooking style functions
    public function cookingStyleStore(Request $request)
    {

        $cookingStyle = new CookingStyle();
        $cookingStyle->name = $request->name;
        $cookingStyle->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cookingStyle->user_id = Auth::user()->id;
        $cookingStyle->save();

        return redirect()->route('admin.cooking.style.show',$cookingStyle->id)->withSuccess('Cooking style updated!');
    }

    public function cookingStyleShow($cooking_style_id)
    {
        // Check if album type exists
        $cookingStyleExists = CookingStyle::findOrFail($cooking_style_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // cooking style
        $cookingStyle = CookingStyle::with('user','status')->where('id',$cooking_style_id)->withCount('meal_cooking_styles')->first();
        // cooking style meals
        $cookingStyleMeals = MealCookingStyle::with('user','status','meal.tudeme')->where('cooking_style_id',$cooking_style_id)->with('meal.tudeme')->get();
        return view('admin.settings.cooking_style_show',compact('cookingStyle','user','cookingStyleMeals','navbarValues'));
    }

    public function cookingStyleCoverImageUpload(Request $request,$cooking_style_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $cookingStyle = CookingStyle::where('id',$cooking_style_id)->first();
        $folderName = str_replace(' ', '', $cookingStyle->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/cooking_style/".$folderName, $file_name_extension);
        $path = public_path()."/cooking_style/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/cooking_style/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cooking_style/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "cooking_style/".$folderName.$file_name;
        $upload->small_thumbnail = "cooking_style/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "cooking_style/".$folderName.$large_thumbnail;
        $upload->banner = "cooking_style/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $cookingStyle = CookingStyle::findOrFail($cooking_style_id);
        $cookingStyle->cover_image_id = $upload->id;
        $cookingStyle->user_id = Auth::user()->id;
        $cookingStyle->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function cookingStyleUpdate(Request $request, $cooking_style_id)
    {

        $cookingStyle = CookingStyle::findOrFail($cooking_style_id);
        $cookingStyle->name = $request->name;
        $cookingStyle->user_id = Auth::user()->id;
        $cookingStyle->save();

        return redirect()->route('admin.cooking.style.show',$cooking_style_id)->withSuccess('Cooking style '. $cookingStyle->name .' updated!');
    }

    public function cookingStyleDelete($cooking_style_id)
    {

        $cookingStyle = CookingStyle::findOrFail($cooking_style_id);
        $cookingStyle->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $cookingStyle->user_id = Auth::user()->id;
        $cookingStyle->save();

        return back()->withSuccess(__('Cooking style '.$cookingStyle->name.' successfully deleted.'));
    }

    public function cookingStyleRestore($cooking_style_id)
    {

        $cookingStyle = CookingStyle::findOrFail($cooking_style_id);
        $cookingStyle->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cookingStyle->user_id = Auth::user()->id;
        $cookingStyle->save();

        return back()->withSuccess(__('Cooking style '.$cookingStyle->name.' successfully restored.'));
    }


    // course functions
    public function courseStore(Request $request)
    {

        $course = new Course();
        $course->name = $request->name;
        $course->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $course->user_id = Auth::user()->id;
        $course->save();

        return redirect()->route('admin.course.show',$course->id)->withSuccess('Course updated!');
    }

    public function courseShow($course_id)
    {
        // Check if meal type exists
        $courseExists = Course::findOrFail($course_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // meal type
        $course = Course::with('user','status')->where('id',$course_id)->withCount('meal_courses')->first();
        // meal type meal
        $courseMeals = MealCourse::with('user','status','meal.tudeme')->where('course_id',$course_id)->get();

        return view('admin.settings.course_show',compact('course','user','courseMeals','navbarValues'));
    }

    public function courseCoverImageUpload(Request $request,$course_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $course = Course::where('id',$course_id)->first();
        $folderName = str_replace(' ', '', $course->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/course/".$folderName, $file_name_extension);
        $path = public_path()."/course/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/course/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/course/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "course/".$folderName.$file_name;
        $upload->small_thumbnail = "course/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "course/".$folderName.$large_thumbnail;
        $upload->banner = "course/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $course = Course::findOrFail($course_id);
        $course->cover_image_id = $upload->id;
        $course->user_id = Auth::user()->id;
        $course->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function courseUpdate(Request $request, $course_id)
    {

        $course = Course::findOrFail($course_id);
        $course->name = $request->name;
        $course->user_id = Auth::user()->id;
        $course->save();

        return redirect()->route('admin.course.show',$course_id)->withSuccess('Course '. $course->name .' updated!');
    }

    public function courseDelete($course_id)
    {

        $course = Course::findOrFail($course_id);
        $course->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $course->user_id = Auth::user()->id;
        $course->save();

        return back()->withSuccess(__('Course '.$course->name.' successfully deleted.'));
    }

    public function courseRestore($course_id)
    {

        $course = Course::findOrFail($course_id);
        $course->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $course->user_id = Auth::user()->id;
        $course->save();

        return back()->withSuccess(__('Course '.$course->name.' successfully restored.'));
    }



    // dietary preference functions
    public function dietaryPreferenceStore(Request $request)
    {

        $dietaryPreference = new DietaryPreference();
        $dietaryPreference->name = $request->name;
        $dietaryPreference->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $dietaryPreference->user_id = Auth::user()->id;
        $dietaryPreference->save();

        return redirect()->route('admin.dietary.preference.show',$dietaryPreference->id)->withSuccess('Dietary preference updated!');
    }

    public function dietaryPreferenceShow($dietary_preference_id)
    {
        // Check if meal type exists
        $dietaryPreferenceExists = DietaryPreference::findOrFail($dietary_preference_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // dietary preference
        $dietaryPreference = DietaryPreference::with('user','status')->where('id',$dietary_preference_id)->withCount('meal_dietary_preferences')->first();
        // dietary preference meals
        $dietaryPreferenceMeals = MealDietaryPreference::with('user','status','meal.tudeme')->where('dietary_preference_id',$dietary_preference_id)->get();

        return view('admin.settings.dietary_preference_show',compact('dietaryPreference','user','dietaryPreferenceMeals','navbarValues'));
    }

    public function dietaryPreferenceCoverImageUpload(Request $request,$dietary_preference_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $dietaryPreference = DietaryPreference::where('id',$dietary_preference_id)->first();
        $folderName = str_replace(' ', '', $dietaryPreference->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/dietary_preference/".$folderName, $file_name_extension);
        $path = public_path()."/dietary_preference/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/dietary_preference/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dietary_preference/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "dietary_preference/".$folderName.$file_name;
        $upload->small_thumbnail = "dietary_preference/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "dietary_preference/".$folderName.$large_thumbnail;
        $upload->banner = "dietary_preference/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $dietaryPreference = DietaryPreference::findOrFail($dietary_preference_id);
        $dietaryPreference->cover_image_id = $upload->id;
        $dietaryPreference->user_id = Auth::user()->id;
        $dietaryPreference->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function dietaryPreferenceUpdate(Request $request, $dietary_preference_id)
    {

        $dietaryPreference = DietaryPreference::findOrFail($dietary_preference_id);
        $dietaryPreference->name = $request->name;
        $dietaryPreference->user_id = Auth::user()->id;
        $dietaryPreference->save();

        return redirect()->route('admin.dietary.preference.show',$dietary_preference_id)->withSuccess('Dietary preference '. $dietaryPreference->name .' updated!');
    }

    public function dietaryPreferenceDelete($dietary_preference_id)
    {

        $dietaryPreference = DietaryPreference::findOrFail($dietary_preference_id);
        $dietaryPreference->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $dietaryPreference->user_id = Auth::user()->id;
        $dietaryPreference->save();

        return back()->withSuccess(__('Dietary preference '.$dietaryPreference->name.' successfully deleted.'));
    }

    public function dietaryPreferenceRestore($dietary_preference_id)
    {

        $dietaryPreference = DietaryPreference::findOrFail($dietary_preference_id);
        $dietaryPreference->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $dietaryPreference->user_id = Auth::user()->id;
        $dietaryPreference->save();

        return back()->withSuccess(__('Dietary preference '.$dietaryPreference->name.' successfully restored.'));
    }


    // dish type functions
    public function dishTypeStore(Request $request)
    {

        $dishType = new DishType();
        $dishType->name = $request->name;
        $dishType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $dishType->user_id = Auth::user()->id;
        $dishType->save();

        return redirect()->route('admin.dish.type.show',$dishType->id)->withSuccess('Dish type updated!');
    }

    public function dishTypeShow($dish_type_id)
    {
        // Check if meal type exists
        $dishTypeExists = DishType::findOrFail($dish_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // dish type
        $dishType = DishType::with('user','status')->where('id',$dish_type_id)->withCount('meals')->first();
        // dish type meals
        $dishTypeMeals = Meal::with('user','status','tudeme')->where('dish_type_id',$dish_type_id)->get();

        return view('admin.settings.dish_type_show',compact('dishType','user','dishTypeMeals','navbarValues'));
    }

    public function dishTypeCoverImageUpload(Request $request,$dish_type_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $dishType = DishType::where('id',$dish_type_id)->first();
        $folderName = str_replace(' ', '', $dishType->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/dish_type/".$folderName, $file_name_extension);
        $path = public_path()."/dish_type/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/dish_type/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/dish_type/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "dish_type/".$folderName.$file_name;
        $upload->small_thumbnail = "dish_type/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "dish_type/".$folderName.$large_thumbnail;
        $upload->banner = "dish_type/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $dishType = DishType::findOrFail($dish_type_id);
        $dishType->cover_image_id = $upload->id;
        $dishType->user_id = Auth::user()->id;
        $dishType->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function dishTypeUpdate(Request $request, $dish_type_id)
    {

        $dishType = DishType::findOrFail($dish_type_id);
        $dishType->name = $request->name;
        $dishType->user_id = Auth::user()->id;
        $dishType->save();

        return redirect()->route('admin.dish.type.show',$dish_type_id)->withSuccess('Dish type '. $dishType->name .' updated!');
    }

    public function dishTypeDelete($dish_type_id)
    {

        $dishType = DishType::findOrFail($dish_type_id);
        $dishType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $dishType->user_id = Auth::user()->id;
        $dishType->save();

        return back()->withSuccess(__('Dish type '.$dishType->name.' successfully deleted.'));
    }

    public function dishTypeRestore($dish_type_id)
    {

        $dishType = DishType::findOrFail($dish_type_id);
        $dishType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $dishType->user_id = Auth::user()->id;
        $dishType->save();

        return back()->withSuccess(__('Dish type '.$dishType->name.' successfully restored.'));
    }


    // tudeme tag functions
    public function tudemeTagStore(Request $request)
    {

        $tudemeTag = new TudemeTag();
        $tudemeTag->name = $request->name;
        $tudemeTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeTag->user_id = Auth::user()->id;
        $tudemeTag->save();

        return redirect()->route('admin.tudeme.tag.show',$tudemeTag->id)->withSuccess('Tudeme tag updated!');
    }

    public function tudemeTagShow($tudeme_tag_id)
    {
        // Check if meal tag exists
        $tudemeTagExists = TudemeTag::findOrFail($tudeme_tag_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // tudeme tag
        $tudemeTag = TudemeTag::with('user','status')->where('id',$tudeme_tag_id)->withCount('tudeme_tudeme_tags')->first();
        // tudeme tag meals
        $tudemeTudemeTags = TudemeTudemeTag::with('user','status','tudeme')->where('tudeme_tag_id',$tudeme_tag_id)->get();

        return view('admin.settings.tudeme_tag_show',compact('tudemeTag','user','tudemeTudemeTags','navbarValues'));
    }

    public function tudemeTagUpdate(Request $request, $tudeme_tag_id)
    {

        $tudemeTag = TudemeTag::findOrFail($tudeme_tag_id);
        $tudemeTag->name = $request->name;
        $tudemeTag->user_id = Auth::user()->id;
        $tudemeTag->save();

        return redirect()->route('admin.tudeme.tag.show',$tudeme_tag_id)->withSuccess('Tudeme tag '. $tudemeTag->name .' updated!');
    }

    public function tudemeTagDelete($tudeme_tag_id)
    {

        $tudemeTag = TudemeTag::findOrFail($tudeme_tag_id);
        $tudemeTag->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tudemeTag->user_id = Auth::user()->id;
        $tudemeTag->save();

        return back()->withSuccess(__('Tudeme tag '.$tudemeTag->name.' successfully deleted.'));
    }

    public function tudemeTagRestore($tudeme_tag_id)
    {

        $tudemeTag = TudemeTag::findOrFail($tudeme_tag_id);
        $tudemeTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeTag->user_id = Auth::user()->id;
        $tudemeTag->save();

        return back()->withSuccess(__('Tudeme tag '.$tudemeTag->name.' successfully restored.'));
    }


    // tudeme type functions
    public function tudemeTypeStore(Request $request)
    {

        $tudemeType = new TudemeType();
        $tudemeType->name = $request->name;
        $tudemeType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeType->user_id = Auth::user()->id;
        $tudemeType->save();

        return redirect()->route('admin.tudeme.type.show',$tudemeType->id)->withSuccess('Tudeme type updated!');
    }

    public function tudemeTypeShow($tudeme_type_id)
    {
        // Check if meal type exists
        $tudemeTypeExists = TudemeType::findOrFail($tudeme_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // tudeme type
        $tudemeType = TudemeType::with('user','status')->where('id',$tudeme_type_id)->withCount('tudeme_tudeme_types')->first();
        // tudeme type meals
        $tudemeTudemeTypes = TudemeTudemeType::with('user','status','tudeme')->where('tudeme_type_id',$tudeme_type_id)->get();

        return view('admin.settings.tudeme_type_show',compact('tudemeType','user','tudemeTudemeTypes','navbarValues'));
    }

    public function tudemeTypeUpdate(Request $request, $tudeme_type_id)
    {

        $tudemeType = TudemeType::findOrFail($tudeme_type_id);
        $tudemeType->name = $request->name;
        $tudemeType->user_id = Auth::user()->id;
        $tudemeType->save();

        return redirect()->route('admin.tudeme.type.show',$tudeme_type_id)->withSuccess('Tudeme type '. $tudemeType->name .' updated!');
    }

    public function tudemeTypeDelete($tudeme_type_id)
    {

        $tudemeType = TudemeType::findOrFail($tudeme_type_id);
        $tudemeType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tudemeType->user_id = Auth::user()->id;
        $tudemeType->save();

        return back()->withSuccess(__('Tudeme type '.$tudemeType->name.' successfully deleted.'));
    }

    public function tudemeTypeRestore($tudeme_type_id)
    {

        $tudemeType = TudemeType::findOrFail($tudeme_type_id);
        $tudemeType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeType->user_id = Auth::user()->id;
        $tudemeType->save();

        return back()->withSuccess(__('Tudeme type '.$tudemeType->name.' successfully restored.'));
    }


    // cuisine functions
    public function cuisineStore(Request $request)
    {

        $cuisine = new Cuisine();
        $cuisine->name = $request->name;
        $cuisine->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cuisine->user_id = Auth::user()->id;
        $cuisine->save();

        return redirect()->route('admin.cuisine.show',$cuisine->id)->withSuccess('Cuisine updated!');
    }

    public function cuisineShow($cuisine_id)
    {
        // Check if meal type exists
        $cuisineExists = Cuisine::findOrFail($cuisine_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // cuisine
        $cuisine = Cuisine::with('user','status')->where('id',$cuisine_id)->withCount('meals')->first();
        // cuisine meals
        $cuisineMeals = Meal::with('user','status','tudeme')->where('cuisine_id',$cuisine_id)->get();

        return view('admin.settings.cuisine_show',compact('cuisine','user','cuisineMeals','navbarValues'));
    }

    public function cuisineCoverImageUpload(Request $request,$cuisine_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $cuisine = Cuisine::where('id',$cuisine_id)->first();
        $folderName = str_replace(' ', '', $cuisine->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/cuisine/".$folderName, $file_name_extension);
        $path = public_path()."/cuisine/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/cuisine/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/cuisine/".$folderName.$large_thumbnail);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
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
        }


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
        $upload->extension = $extension;
        $upload->original = "cuisine/".$folderName.$file_name;
        $upload->small_thumbnail = "cuisine/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "cuisine/".$folderName.$large_thumbnail;
        $upload->banner = "cuisine/".$folderName.$banner;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->size = $size;
        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $cuisine = Cuisine::findOrFail($cuisine_id);
        $cuisine->cover_image_id = $upload->id;
        $cuisine->user_id = Auth::user()->id;
        $cuisine->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function cuisineUpdate(Request $request, $cuisine_id)
    {

        $cuisine = Cuisine::findOrFail($cuisine_id);
        $cuisine->name = $request->name;
        $cuisine->user_id = Auth::user()->id;
        $cuisine->save();

        return redirect()->route('admin.cuisine.show',$cuisine_id)->withSuccess('Cuisine '. $cuisine->name .' updated!');
    }

    public function cuisineDelete($cuisine_id)
    {

        $cuisine = Cuisine::findOrFail($cuisine_id);
        $cuisine->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $cuisine->user_id = Auth::user()->id;
        $cuisine->save();

        return back()->withSuccess(__('Cuisine '.$cuisine->name.' successfully deleted.'));
    }

    public function cuisineRestore($cuisine_id)
    {

        $cuisine = Cuisine::findOrFail($cuisine_id);
        $cuisine->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $cuisine->user_id = Auth::user()->id;
        $cuisine->save();

        return back()->withSuccess(__('Cuisine '.$cuisine->name.' successfully restored.'));
    }






    // letter tag functions
    public function letterTagStore(Request $request)
    {

        $letterTag = new LetterTag();
        $letterTag->name = $request->name;
        $letterTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $letterTag->user_id = Auth::user()->id;
        $letterTag->save();

        return redirect()->route('admin.letter.tag.show',$letterTag->id)->withSuccess('Letter tag updated!');
    }

    public function letterTagShow($letter_tag_id)
    {
        // Check if letter tag exists
        $letterTagExists = LetterTag::findOrFail($letter_tag_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // letter tag
        $letterTag = LetterTag::with('user','status')->where('id',$letter_tag_id)->withCount('letterLetterTags')->first();
        // letter tag letters
        $letterLetterTags = LetterLetterTag::with('user','status')->where('letter_tag_id',$letter_tag_id)->with('letter')->get();
        return view('admin.settings.letter_tag_show',compact('letterTag','user','letterLetterTags','navbarValues'));
    }

    public function letterTagUpdate(Request $request, $letter_tag_id)
    {

        $letterTag = LetterTag::findOrFail($letter_tag_id);
        $letterTag->name = $request->name;
        $letterTag->user_id = Auth::user()->id;
        $letterTag->save();

        return redirect()->route('admin.letter.tag.show',$letter_tag_id)->withSuccess('Letter tag '. $letterTag->name .' updated!');
    }

    public function letterTagDelete($letter_tag_id)
    {

        $letterTag = LetterTag::findOrFail($letter_tag_id);
        $letterTag->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $letterTag->user_id = Auth::user()->id;
        $letterTag->save();

        return back()->withSuccess(__('Letter tag '.$letterTag->name.' successfully deleted.'));
    }

    public function letterTagRestore($letter_tag_id)
    {

        $letterTag = LetterTag::findOrFail($letter_tag_id);
        $letterTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $letterTag->user_id = Auth::user()->id;
        $letterTag->save();

        return back()->withSuccess(__('Letter tag '.$letterTag->name.' successfully restored.'));
    }

}
