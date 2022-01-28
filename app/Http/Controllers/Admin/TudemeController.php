<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Tag;
use Storage;
use App\Meal;
use App\Note;
use App\Deal;
use App\Label;
use App\ToDo;
use App\Status;
use App\Course;
use App\Upload;
use App\Tudeme;
use App\Design;
use App\Journal;
use App\Cuisine;
use App\Project;
use App\Contact;
use App\DishType;
use App\TudemeTag;
use App\MealCourse;
use App\Ingredient;
use App\TudemeType;
use App\Measurment;
use App\Instruction;
use App\CookingSkill;
use App\CookingStyle;
use App\JournalSeries;
use App\TudemeGallery;
use App\MealIngredient;
use App\TudemeTudemeTag;
use App\TudemeTopRecipie;
use App\MealCookingStyle;
use App\TudemeTudemeType;
use App\TudemeTopSection;
use App\DietaryPreference;
use App\Traits\UserTrait;
use App\TudemeTopLocation;
use App\Traits\NavbarTrait;
use App\Traits\TudemeTrait;
use Illuminate\Http\Request;
use App\MealDietaryPreference;
use App\TudemeFeaturedRecipie;
use App\Traits\StatusCountTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use Intervention\Image\ImageManagerStatic as Image;

class TudemeController extends Controller
{


    use UserTrait;
    use NavbarTrait;
    use TudemeTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // tudemes
    public function tudemeHomePage()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $tudemeStatusCount = $this->tudemeStatusCount();
        // tudeme top location
        $tudemeTopLocations = TudemeTopLocation::with('active_tudeme_top_section')->get();
        // Get tudemes
        $tudemes = Tudeme::with('user','status','active_tudeme_top_section.tudeme_top_location')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->get();
        // tudeme top section
        $tudemeTopSections = TudemeTopSection::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme','tudeme_top_location')->get();
        // tudeme top recipies
        $tudemeTopRecipies = TudemeTopRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme')->get();

        // tudeme top recipies tudeme ids
        $tudemeTopRecipieTudemeIds = TudemeTopRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->select('tudeme_id')->get()->toArray();
        // get tudeme which arent part of the top recipies
        $unassignedTopRecipieTudeme = Tudeme::whereNotIn('id',$tudemeTopRecipieTudemeIds)->get();

        // tudeme featured recipies
        $tudemeFeaturedRecipies = TudemeFeaturedRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme')->get();

        // tudeme featured recipies tudeme ids
        $tudemeFeaturedRecipieTudemeIds = TudemeFeaturedRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->select('tudeme_id')->get()->toArray();
        // get tudeme which arent part of the featured recipies
        $unassignedFeaturedRecipieTudeme = Tudeme::whereNotIn('id',$tudemeFeaturedRecipieTudemeIds)->get();




        return view('admin.work.tudeme_homepage',compact('user','navbarValues','tudemeStatusCount','tudemeTopLocations','tudemes','tudemeTopSections','tudemeTopRecipies','tudemeFeaturedRecipies','unassignedTopRecipieTudeme','unassignedFeaturedRecipieTudeme'));
    }

    public function tudemeTopSectionStore(Request $request)
    {

        // make inactive
        TudemeTopSection::where('tudeme_top_location_id', '=', $request->tudeme_top_location)->update(['status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);

        // get tudeme
        $tudeme = Tudeme::with('user','status')->where('id',$request->tudeme)->first();
        // get tudeme top location
        $tudemeTopLocation = TudemeTopLocation::with('active_tudeme_top_section')->where('id',$request->tudeme_top_location)->first();
        // check if the tudeme is already assigned to a location
        $tudemeAllocated = TudemeTopSection::with('tudeme_top_location')->where('tudeme_id',$request->tudeme)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->first();
        if($tudemeAllocated){
            return redirect()->route('admin.tudeme.homepage')->withWarning('Tudeme '.$tudeme->name.' has already been assigned to the '.$tudemeAllocated->tudeme_top_location->location);
        }

        // Create
        $user = $this->getAdmin();
        $tudemeTopSection = new TudemeTopSection();
        $tudemeTopSection->tudeme_id = $request->tudeme;
        $tudemeTopSection->tudeme_top_location_id = $request->tudeme_top_location;
        $tudemeTopSection->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeTopSection->user_id = Auth::user()->id;
        $tudemeTopSection->save();

        return redirect()->route('admin.tudeme.homepage')->withSuccess('Tudeme homepage location '.$tudemeTopLocation->location.' has been assigned to '.$tudeme->name);
    }

    public function tudemeTopRecipieStore(Request $request)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $tudemeStatusCount = $this->tudemeStatusCount();

        // get tudeme
        $tudeme = Tudeme::with('user','status')->where('id',$request->tudeme)->first();

        // check if allready assigned
        $tudemeAllocated = TudemeTopRecipie::where('tudeme_id',$request->tudeme)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->first();
        if($tudemeAllocated){
            return redirect()->route('admin.tudeme.homepage')->withWarning('Tudeme '.$tudeme->name.' has already been assigned');
        }

        // get count of assigned
        $tudemeTopRecipiesCount = TudemeTopRecipie::where('is_featured',False)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme')->count();
        if ($tudemeTopRecipiesCount >= 4){
            // get the last one created
            $oldestActiveTopRecipie = TudemeTopRecipie::with('tudeme')->where('is_featured',False)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->orderBy('created_at')->first()->update(['status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);
            // return $oldestActiveTopRecipie;
            // update it to deleted
            // TudemeTopRecipie::where('id', $oldestActiveTopRecipie)->update(['status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);
        }

        //store
        $tudemeTopRecipie = new TudemeTopRecipie();
        $tudemeTopRecipie->tudeme_id = $request->tudeme;

        if($request->is_featured == "on"){
            $tudemeTopRecipie->is_featured = True;

            // set rest of featured to deleted
            TudemeTopRecipie::where('is_featured', True)->update(['is_featured' => False,'status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);
            $featured = "featured";
        }else{
            $tudemeTopRecipie->is_featured = False;
            $featured = "";
        }

        $tudemeTopRecipie->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeTopRecipie->user_id = Auth::user()->id;
        $tudemeTopRecipie->save();

        return redirect()->route('admin.tudeme.homepage')->withSuccess('Tudeme '.$tudeme->name.' has been assigned as a '.$featured.' top recipie');
    }

    public function tudemeFeaturedRecipieStore(Request $request)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $tudemeStatusCount = $this->tudemeStatusCount();

        // get tudeme
        $tudeme = Tudeme::with('user','status')->where('id',$request->tudeme)->first();

        // check if allready assigned
        $tudemeAllocated = TudemeFeaturedRecipie::where('tudeme_id',$request->tudeme)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->first();
        if($tudemeAllocated){
            return redirect()->route('admin.tudeme.homepage')->withWarning('Tudeme '.$tudeme->name.' has already been assigned');
        }

        // get count of assigned
        $tudemeFeaturedRecipiesCount = TudemeFeaturedRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme')->count();
        if ($tudemeFeaturedRecipiesCount >= 2){
            // get the last one created
            $oldestActiveFeaturedRecipie = TudemeFeaturedRecipie::with('tudeme')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->orderBy('created_at')->first()->update(['status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);
            // return $oldestActiveTopRecipie;
            // update it to deleted
            // TudemeTopRecipie::where('id', $oldestActiveTopRecipie)->update(['status_id' => 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a']);
        }

        //store
        $tudemeFeaturedRecipie = new TudemeFeaturedRecipie();
        $tudemeFeaturedRecipie->tudeme_id = $request->tudeme;
        $tudemeFeaturedRecipie->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeFeaturedRecipie->user_id = Auth::user()->id;
        $tudemeFeaturedRecipie->save();

        return redirect()->route('admin.tudeme.homepage')->withSuccess('Tudeme '.$tudeme->name.' has been assigned as a featured recipie');
    }

    // tudemes
    public function tudeme()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $tudemeStatusCount = $this->tudemeStatusCount();
        // Get tudemes
        $tudemes = Tudeme::with('user','status')->get();
        // tudeme types
        $tudemeTypes = TudemeType::all();
        // tudeme tags
        $tudemeTags = TudemeTag::all();
        return view('admin.work.tudeme',compact('tudemes','user','navbarValues','tudemeStatusCount','tudemeTags','tudemeTypes'));
    }

    public function tudemeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // tudeme types
        $tudemeTypes = TudemeType::all();
        // tudeme tags
        $tudemeTags = TudemeTag::all();
        return view('admin.work.tudeme_create',compact('user','navbarValues','tudemeTags','tudemeTypes'));
    }

    public function tudemeStore(Request $request)
    {

        $tudeme = new Tudeme();
        $tudeme->name = $request->name;
        $tudeme->description = $request->description;
        $tudeme->body = $request->body;
        $tudeme->prep_time = $request->prep_time;
        $tudeme->cook_time = $request->cook_time;
        $tudeme->yield = $request->yield;
        $tudeme->serves = $request->serves;
        $tudeme->date = date('Y-m-d', strtotime($request->date));
        $tudeme->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $tudeme->user_id = Auth::user()->id;
        $tudeme->save();

        // tudeme tudeme type
        foreach ($request->tudeme_types as $tudeme_type){
            $tudemeTudemeType = new TudemeTudemeType();
            $tudemeTudemeType->tudeme_id = $tudeme->id;
            $tudemeTudemeType->tudeme_type_id = $tudeme_type;
            $tudemeTudemeType->user_id = Auth::user()->id;
            $tudemeTudemeType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $tudemeTudemeType->save();
        }

        // tudeme tudeme tag
        foreach ($request->tudeme_tags as $tudeme_tag){
            $tudemeTudemeTag = new TudemeTudemeTag();
            $tudemeTudemeTag->tudeme_id = $tudeme->id;
            $tudemeTudemeTag->tudeme_tag_id = $tudeme_tag;
            $tudemeTudemeTag->user_id = Auth::user()->id;
            $tudemeTudemeTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $tudemeTudemeTag->save();
        }

        return redirect()->route('admin.tudeme.show',$tudeme->id)->withSuccess('Tudeme '.$tudeme->name.' succesfully created');
    }

    public function tudemeShow($tudeme_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get project aggregations
        $tudemeArray = $this->getTudeme($tudeme_id);
        // Get views and downloads
        $tudemeViews = $this->getTudemeViews($tudeme_id);
        // Get tudeme
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme = Tudeme::where('id',$tudeme_id)->with('user','status','cover_image','spread','icon')->first();
        // Tudeme status
        $tudemeStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();
        // tudeme journals
        $journals = Journal::where('is_tudeme',True)->where('tudeme_id',$tudeme_id)->with('user','status')->orderBy('created_at', 'desc')->get();
        // tudeme meals
        $meals = Meal::where('tudeme_id',$tudeme_id)->with('user','status')->orderBy('created_at', 'desc')->get();

        // tudeme types
        $tudemeTypes = TudemeType::all();
        // tudeme tags
        $tudemeTags = TudemeTag::all();

        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Projects
        $projects = Project::all();
        // Design
        $designs = Design::all();
        // Design
        $tudemes = Tudeme::all();
        // Deal
        $deals = Deal::all();

        // tudeme tudeme types
        $tudemeTudemeTypes = TudemeTudemeType::where('tudeme_id',$tudeme->id)->get();
        // tudeme tudeme tags
        $tudemeTudemeTags = TudemeTudemeTag::where('tudeme_id',$tudeme->id)->get();

        // tudeme gallery
        $tudemeGallery = TudemeGallery::where('tudeme_id',$tudeme_id)->with('upload')->get();
        return view('admin.work.tudeme_show',compact('user','tudeme','tudemeGallery','tudemeStatuses','navbarValues','tudemeArray','tudemeViews','meals','journals','tudemeTypes','tudemeTags','tudemeTudemeTypes','tudemeTudemeTags','tags','contacts','projects','designs','tudemes','deals'));
    }

    public function tudemePersonalAlbumCreate($tudeme_id)
    {

        // get design
        $tudeme = Tudeme::findOrFail($tudeme_id);
        // Tags
        $tags = Tag::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.work.tudeme_personal_album_create',compact('user','tags','navbarValues','tudeme'));

    }

    // journals
    public function tudemeJournals()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->journalsStatusCount();
        // Get journals
        $journals = Journal::with('user','status')->where('is_tudeme',True)->get();
        // get journal series
        $journalSeries = JournalSeries::with('user','status')->where('is_tudeme',True)->withCount('journals')->get();


        return view('admin.work.journals',compact('journalSeries','journals','user','navbarValues','journalsStatusCount'));
    }

    public function tudemeJournalCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.work.tudeme_journal_create',compact('user','labels','navbarValues'));
    }

    public function tudemeTextShow($tudeme_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get tudeme
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme = Tudeme::where('id',$tudeme_id)->with('user','status','cover_image')->first();

        return view('admin.work.tudeme_text_show',compact('user','tudeme','navbarValues'));
    }

    public function tudemeTextUpdate(Request $request, $tudeme_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if tudeme exists and get
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->body = $request->body;
        $tudeme->save();


        return back()->withSuccess(__('Journal successfully uploaded.'));
    }

    public function tudemeUpdate(Request $request, $tudeme_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if tudeme exists and get
        $tudeme = Tudeme::findOrFail($tudeme_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $tudeme->cover_image_id == "" ){
            return back()->withWarning(__('Please set a cover image before making the tudeme to published.'));
        }elseif ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $tudeme->spread_id == "" ){
            return back()->withWarning(__('Please set a spread image before making the tudeme to published.'));
        }elseif ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $tudeme->icon_id == ""){
            return back()->withWarning(__('Please set the icon before making the tudeme to published.'));
        }

        $tudeme->name = $request->name;
        $tudeme->description = $request->description;
        $tudeme->body = $request->body;
        $tudeme->status_id = $request->status;
        $tudeme->date = date('Y-m-d', strtotime($request->date));
        $tudeme->save();

        // tudeme types update
        $tudemeRequestTypes =array();
        foreach ($request->tudeme_types as $tudemeTudemeType){
            // Append to array
            $tudemeRequestTypes[]['id'] = $tudemeTudemeType;

            // Check if tudeme type exists
            $tudemeType = TudemeTudemeType::where('tudeme_id',$tudeme->id)->where('tudeme_type_id',$tudemeTudemeType)->first();

            if($tudemeType === null) {
                $tudemeType = new TudemeTudemeType();
                $tudemeType->tudeme_id = $tudeme->id;
                $tudemeType->tudeme_type_id = $tudemeTudemeType;
                $tudemeType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $tudemeType->user_id = Auth::user()->id;
                $tudemeType->save();
            }
        }

        $tudemeTypesIds = TudemeTudemeType::where('tudeme_id',$tudeme_id)->whereNotIn('tudeme_type_id',$tudemeRequestTypes)->select('id')->get()->toArray();
        DB::table('tudeme_tudeme_types')->whereIn('id', $tudemeTypesIds)->delete();


        // tudeme tags update
        $tudemeRequestTags =array();
        foreach ($request->tudeme_tags as $tudemeTudemeTag){
            // Append to array
            $tudemeRequestTags[]['id'] = $tudemeTudemeTag;

            // Check if tudeme tag exists
            $tudemeTag = TudemeTudemeTag::where('tudeme_id',$tudeme->id)->where('tudeme_tag_id',$tudemeTudemeTag)->first();

            if($tudemeTag === null) {
                $tudemeTag = new TudemeTudemeTag();
                $tudemeTag->tudeme_id = $tudeme->id;
                $tudemeTag->tudeme_tag_id = $tudemeTudemeTag;
                $tudemeTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $tudemeTag->user_id = Auth::user()->id;
                $tudemeTag->save();
            }
        }

        $tudemeTagsIds = TudemeTudemeTag::where('tudeme_id',$tudeme_id)->whereNotIn('tudeme_tag_id',$tudemeRequestTags)->select('id')->get()->toArray();
        DB::table('tudeme_tudeme_tags')->whereIn('id', $tudemeTagsIds)->delete();


        return back()->withSuccess(__('Tudeme successfully uploaded.'));
    }

    public function tudemeCoverImageUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', "work/tudeme/".$tudeme->name);
        $originalFolderName = str_replace(' ', '', $folderName."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', $folderName."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', $folderName."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', $folderName."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', $folderName."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', $folderName."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', $folderName."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', $folderName."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', $folderName."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/".$originalFolderName, $file_name_extension);
        $path = public_path()."/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);

            $cover300Image = Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name)->encode();

            $cover750Image = Image::make( $path )->fit(750, 730)->save(public_path()."/".$pixel750FolderName.$image_name);

            $cover1500Image = Image::make( $path )->resize(1766, 698, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);

        } else {

            $orientation = "portrait";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);

            $cover300Image = Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);

            $cover750Image =  Image::make( $path )->fit(750, 730)->save(public_path()."/".$pixel500FolderName.$image_name);

            $cover1500Image = Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        // upload image
        $created = Storage::disk('linode')->put( $pixel100FolderName.'/'.$image_name, (string) $cover100Image);
        $created = Storage::disk('linode')->put( $pixel300FolderName.'/'.$image_name, (string) $cover300Image);
        $created = Storage::disk('linode')->put( $pixel750FolderName.'/'.$image_name, (string) $cover750Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1500Image);

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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->cover_image_id = $upload->id;
        $tudeme->save();

        // delete the local folder
        File::deleteDirectory(public_path()."/".$folderName);

        return back()->withSuccess(__('Tudeme cover image successfully uploaded.'));
    }

    public function tudemeSpreadUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', "work/tudeme/".$tudeme->name);
        $originalFolderName = str_replace(' ', '', $folderName."/Spread/Original/");

        $pixel100FolderName = str_replace(' ', '', $folderName."/Spread"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', $folderName."/Spread"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', $folderName."/Spread"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', $folderName."/Spread"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', $folderName."/Spread"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', $folderName."/Spread"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', $folderName."/Spread"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', $folderName."/Spread"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/".$originalFolderName, $file_name_extension);
        $path = public_path()."/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);

            $cover500Image = Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);

            $cover750Image = Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

            $cover1000Image = Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            $cover500Image = Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);

            $cover750Image = Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

            $cover1000Image = Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        $created = Storage::disk('linode')->put( $pixel100FolderName.'/'.$image_name, (string) $cover100Image);
        $created = Storage::disk('linode')->put( $pixel300FolderName.'/'.$image_name, (string) $cover300Image);
        $created = Storage::disk('linode')->put( $pixel750FolderName.'/'.$image_name, (string) $cover500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover750Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1000Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover2500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover3600Image);

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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->spread_id = $upload->id;
        $tudeme->save();

        // delete the local folder
        File::deleteDirectory(public_path()."/".$folderName);

        return back()->withSuccess(__('Tudeme spread successfully uploaded.'));
    }

    public function tudemeIconUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', "work/tudeme/".$tudeme->name);
        $originalFolderName = str_replace(' ', '', $folderName."/Icon/Original/");

        $pixel100FolderName = str_replace(' ', '', $folderName."/Icon"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', $folderName."/Icon"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', $folderName."/Icon"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', $folderName."/Icon"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', $folderName."/Icon"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', $folderName."/Icon"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', $folderName."/Icon"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', $folderName."/Icon"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/".$originalFolderName, $file_name_extension);
        $path = public_path()."/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);

            $cover500Image = Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);

            $cover750Image = Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);

            $cover1000Image = Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            $cover500Image = Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            $cover750Image = Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);

            $cover1000Image = Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        $created = Storage::disk('linode')->put( $pixel100FolderName.'/'.$image_name, (string) $cover100Image);
        $created = Storage::disk('linode')->put( $pixel300FolderName.'/'.$image_name, (string) $cover300Image);
        $created = Storage::disk('linode')->put( $pixel750FolderName.'/'.$image_name, (string) $cover500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover750Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1000Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover2500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover3600Image);

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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->icon_id = $upload->id;
        $tudeme->save();

        // delete the local folder
        File::deleteDirectory(public_path()."/".$folderName);

        return back()->withSuccess(__('Tudeme cover image successfully uploaded.'));
    }

    public function tudemeGalleryImageUpload(Request $request,$tudeme_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', "work/tudeme/".$tudeme->name);
        $originalFolderName = str_replace(' ', '', $folderName."/Gallery/Original/");

        $pixel100FolderName = str_replace(' ', '', $folderName."/Gallery"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', $folderName."/Gallery"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', $folderName."/Gallery"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', $folderName."/Gallery"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', $folderName."/Gallery"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', $folderName."/Gallery"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', $folderName."/Gallery"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', $folderName."/Gallery"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/".$originalFolderName, $file_name_extension);
        $path = public_path()."/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            $cover500Image = Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            $cover750Image = Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            $cover1000Image = Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            $cover100Image = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            $cover300Image = Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            $cover500Image = Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            $cover750Image = Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            $cover1000Image = Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            $cover1500Image = Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            $cover2500Image = Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            $cover3600Image = Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        $created = Storage::disk('linode')->put( $pixel100FolderName.'/'.$image_name, (string) $cover100Image);
        $created = Storage::disk('linode')->put( $pixel300FolderName.'/'.$image_name, (string) $cover300Image);
        $created = Storage::disk('linode')->put( $pixel750FolderName.'/'.$image_name, (string) $cover500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover750Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1000Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover1500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover2500Image);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $cover3600Image);

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
        $upload->size = $size;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->orientation = $orientation;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->upload_type_id = "720a967d-16b1-46c4-b22d-9e734e94c9e9";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Tudeme gallery record
        $tudemeGallery = new TudemeGallery();
        $tudemeGallery->upload_id = $upload->id;
        $tudemeGallery->tudeme_id = $tudeme->id;
        $tudemeGallery->user_id = Auth::user()->id;
        $tudemeGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeGallery->save();

        // delete the local folder
        File::deleteDirectory(public_path()."/".$folderName);

        return back()->withSuccess(__('Tudeme gallery image successfully uploaded.'));
    }

    public function tudemeUpdateDesign(Request $request, $tudeme_id)
    {
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->typography_id = $request->typography;
        $tudeme->thumbnail_size_id = $request->thumbnail_size;
        $tudeme->save();

        return back()->withSuccess('Tudeme design updated!');
    }

    public function tudemeDelete($album_type_id)
    {

        $tudeme = Tudeme::findOrFail($album_type_id);
        $tudeme->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tudeme->save();

        return back()->withSuccess(__('Tudeme '.$tudeme->name.' successfully deleted.'));
    }

    public function tudemeRestore($album_type_id)
    {

        $tudeme = Tudeme::findOrFail($album_type_id);
        $tudeme->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudeme->save();

        return back()->withSuccess(__('Tudeme '.$tudeme->name.' successfully restored.'));
    }

    public function tudemeMealCreate($tudeme_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // tudeme
        $tudeme = Tudeme::findOrFail($tudeme_id);

        // cuisine
        $cuisines = Cuisine::all();
        // cooking skill
        $cookingSkills = CookingSkill::all();
        // cooking style
        $cookingStyles = CookingStyle::all();
        // course
        $courses = Course::all();
        // dietary preference
        $dietaryPreferences = DietaryPreference::all();
        // dish type
        $dishTypes = DishType::all();
        // ingredients
        $ingredients = Ingredient::all();
        // measurments
        $measurments = Measurment::all();

        return view('admin.work.tudeme_meal_create',compact('measurments','ingredients','user','navbarValues','tudeme','dishTypes','dietaryPreferences','courses','cookingStyles','cookingSkills','cuisines'));

    }

    public function tudemeMealStore(Request $request, $tudeme_id)
    {

        // return $request;

        $meal = new Meal();
        $meal->name = $request->name;
        $meal->number = 1;
        $meal->cook_time = 1;
        $meal->description = $request->description;
        $meal->body = $request->body;
        $meal->tudeme_id = $tudeme_id;
        $meal->cooking_skill_id = $request->cooking_skill;
        $meal->cuisine_id = $request->cuisine;
        $meal->dish_type_id = $request->dish_type;
        $meal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $meal->user_id = Auth::user()->id;
        $meal->save();

        // meal cooking styles
        foreach ($request->cooking_styles as $cookingStyles){
            $mealCookingStyle = new MealCookingStyle();
            $mealCookingStyle->meal_id = $meal->id;
            $mealCookingStyle->cooking_style_id = $cookingStyles;
            $mealCookingStyle->user_id = Auth::user()->id;
            $mealCookingStyle->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealCookingStyle->save();
        }


        // meal course
        foreach ($request->courses as $course){
            $mealCourse = new MealCourse();
            $mealCourse->meal_id = $meal->id;
            $mealCourse->course_id = $course;
            $mealCourse->user_id = Auth::user()->id;
            $mealCourse->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealCourse->save();
        }

        // meal dietary preference
        foreach ($request->dietary_preferences as $dietaryPreference){
            $mealDietaryPreference = new MealDietaryPreference();
            $mealDietaryPreference->meal_id = $meal->id;
            $mealDietaryPreference->dietary_preference_id = $dietaryPreference;
            $mealDietaryPreference->user_id = Auth::user()->id;
            $mealDietaryPreference->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealDietaryPreference->save();
        }

        // meal ingredients
        foreach ($request->ingredients as $ingredients){
            $mealIngredient = new MealIngredient();
            $mealIngredient->meal_id = $meal->id;

            // measurment
            $mealIngredient->measurment_id = $ingredients['measurment'];
            $measurment = Measurment::findOrFail($ingredients['measurment']);

            // ingredient
            $mealIngredient->ingredient_id = $ingredients['ingredient'];
            $ingredient = Ingredient::findOrFail($ingredients['ingredient']);

            $mealIngredient->ingredient = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->details = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->extra = $ingredients['extra'];
            $mealIngredient->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealIngredient->user_id = Auth::user()->id;
            $mealIngredient->save();
        }

        // instructions
        foreach ($request->instructions as $mealInstruction){
            // return $mealInstruction;
            $instruction = new Instruction();
            $instruction->instruction = $mealInstruction['instruction'];
            $instruction->number = $mealInstruction['number'];
            $instruction->meal_id = $meal->id;
            $instruction->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $instruction->user_id = Auth::user()->id;
            $instruction->save();
        }

        // notes
        foreach ($request->notes as $mealNote){
            // return $mealInstruction;
            $note = new Note();
            $note->notes = $mealNote['note'];
            $note->tudeme_id = $tudeme_id;
            $note->is_meal = True;
            $note->meal_id = $meal->id;
            $note->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $note->user_id = Auth::user()->id;
            $note->save();
        }

        return redirect()->route('admin.tudeme.meal.show',$meal->id)->withSuccess(__('Meal sucessfully saved.'));

    }
    public function tudemeMealShow($tudeme_meal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // cuisine
        $cuisines = Cuisine::all();
        // cooking skill
        $cookingSkills = CookingSkill::all();
        // cooking style
        $cookingStyles = CookingStyle::all();
        // course
        $courses = Course::all();
        // dietary preference
        $dietaryPreferences = DietaryPreference::all();
        // dish type
        $dishTypes = DishType::all();
        // ingredients
        $ingredients = Ingredient::all();
        // measurments
        $measurments = Measurment::all();

        $tudemeMealExists = Meal::findOrFail($tudeme_meal_id);
        $tudemeMeal = Meal::where('id',$tudeme_meal_id)->with('cooking_skill','dish_type','tudeme','meal_cooking_styles','meal_courses','meal_dietary_preferences','meal_ingredients.measurment','meal_ingredients.ingredient','instructions')->withCount('instructions')->first();

        return view('admin.work.tudeme_meal_show',compact('measurments','ingredients','user','navbarValues','tudemeMeal','dishTypes','dietaryPreferences','courses','cookingStyles','cookingSkills','cuisines', 'tudemeMealExists'));

    }

    public function tudemeMealUpdate(Request $request, $meal_id)
    {

        // return $request;

        $mealExists = Meal::findOrFail($meal_id);
        $meal = Meal::where('id',$meal_id)->first();

        $meal->name = $request->name;
        $meal->number = 1;
        $meal->cook_time = 1;
        $meal->description = $request->description;
        $meal->body = $request->body;
        $meal->cooking_skill_id = $request->cooking_skill;
        $meal->cuisine_id = $request->cuisine;
        $meal->dish_type_id = $request->dish_type;
        $meal->save();

        // meal cooking style update
        $mealCookingStyleRequestIds =array();
        foreach ($request->cooking_styles as $mealCookingStyleId){
            // Append to array
            $mealCookingStyleRequestIds[]['id'] = $mealCookingStyleId;

            // Check if tudeme type exists
            $tudemeType = MealCookingStyle::where('meal_id',$meal->id)->where('cooking_style_id',$mealCookingStyleId)->first();

            if($tudemeType === null) {
                $mealCookingStyle = new MealCookingStyle();
                $mealCookingStyle->meal_id = $meal->id;
                $mealCookingStyle->cooking_style_id = $mealCookingStyleId;
                $mealCookingStyle->user_id = Auth::user()->id;
                $mealCookingStyle->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $mealCookingStyle->save();
            }

        }
        // delete removed cooking styles
        $mealCookingStyleIds = MealCookingStyle::where('meal_id',$meal_id)->whereNotIn('cooking_style_id',$mealCookingStyleRequestIds)->select('id')->get()->toArray();
        DB::table('meal_cooking_styles')->whereIn('id', $mealCookingStyleIds)->delete();


        // course update
        $mealCourseRequestIds =array();
        foreach ($request->courses as $mealCourseId){
            // Append to array
            $mealCourseRequestIds[]['id'] = $mealCourseId;

            // Check if tudeme type exists
            $tudemeType = MealCourse::where('meal_id',$meal->id)->where('course_id',$mealCourseId)->first();

            if($tudemeType === null) {
                $mealCourse = new MealCourse();
                $mealCourse->meal_id = $meal->id;
                $mealCourse->course_id = $mealCourseId;
                $mealCourse->user_id = Auth::user()->id;
                $mealCourse->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $mealCourse->save();
            }

        }
        // delete removed cooking styles
        $mealCourseIds = MealCourse::where('meal_id',$meal_id)->whereNotIn('course_id',$mealCourseRequestIds)->select('id')->get()->toArray();
        DB::table('meal_courses')->whereIn('id', $mealCourseIds)->delete();


        // dietary preference update
        $mealDietaryPreferenceRequestIds =array();
        foreach ($request->dietary_preferences as $mealDietaryPreferenceId){
            // Append to array
            $mealDietaryPreferenceRequestIds[]['id'] = $mealDietaryPreferenceId;

            // Check if tudeme type exists
            $tudemeType = MealDietaryPreference::where('meal_id',$meal->id)->where('dietary_preference_id',$mealDietaryPreferenceId)->first();

            if($tudemeType === null) {
                $mealDietaryPreference = new MealDietaryPreference();
                $mealDietaryPreference->meal_id = $meal->id;
                $mealDietaryPreference->dietary_preference_id = $mealDietaryPreferenceId;
                $mealDietaryPreference->user_id = Auth::user()->id;
                $mealDietaryPreference->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $mealDietaryPreference->save();
            }

        }
        // delete removed cooking styles
        $mealDietaryPreferenceIds = MealDietaryPreference::where('meal_id',$meal_id)->whereNotIn('dietary_preference_id',$mealDietaryPreferenceRequestIds)->select('id')->get()->toArray();
        DB::table('meal_dietary_preferences')->whereIn('id', $mealDietaryPreferenceIds)->delete();



        // delete all meal ingredients
        DB::table('meal_ingredients')->where('meal_id', $meal_id)->delete();

        // meal ingredients
        foreach ($request->ingredients as $ingredients){
            $mealIngredient = new MealIngredient();
            $mealIngredient->meal_id = $meal->id;

            // measurment
            $mealIngredient->measurment_id = $ingredients['measurment'];
            $measurment = Measurment::findOrFail($ingredients['measurment']);

            // ingredient
            $mealIngredient->ingredient_id = $ingredients['ingredient'];
            $ingredient = Ingredient::findOrFail($ingredients['ingredient']);

            $mealIngredient->ingredient = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->details = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->extra = $ingredients['extra'];
            $mealIngredient->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealIngredient->user_id = Auth::user()->id;
            $mealIngredient->save();
        }

        // delete meal instructions
        DB::table('instructions')->where('meal_id', $meal_id)->delete();

        // instructions
        foreach ($request->instructions as $mealInstruction){
            // return $mealInstruction;
            $instruction = new Instruction();
            $instruction->instruction = $mealInstruction['instruction'];
            $instruction->number = $mealInstruction['number'];
            $instruction->meal_id = $meal->id;
            $instruction->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $instruction->user_id = Auth::user()->id;
            $instruction->save();
        }

        // delete meal notes
        DB::table('notes')->where('meal_id', $meal_id)->delete();

        // notes
        foreach ($request->notes as $mealNote){
            // return $mealInstruction;
            $note = new Note();
            $note->notes = $mealNote['note'];
            $note->tudeme_id = $meal->tudeme_id;
            $note->is_meal = True;
            $note->meal_id = $meal->id;
            $note->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $note->user_id = Auth::user()->id;
            $note->save();
        }

        return redirect()->route('admin.tudeme.meal.show',$meal->id)->withSuccess(__('Meal sucessfully saved.'));

    }

}
