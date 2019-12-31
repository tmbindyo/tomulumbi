<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Category;
use App\Client;
use App\Contact;
use App\Design;
use App\DesignCategory;
use App\DesignContact;
use App\DesignGallery;
use App\DesignWork;
use App\Status;
use App\Tag;
use App\ToDo;
use App\Traits\DesignTrait;
use App\Traits\DownloadViewNumbersTrait;
use App\Traits\NavbarTrait;
use App\Traits\StatusCountTrait;
use App\Typography;
use App\Upload;
use Auth;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Journal;
use App\Label;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class DesignController extends Controller
{
    use UserTrait;
    use DesignTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use DownloadViewNumbersTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function designs()
    {
        // User
        $user = $this->getAdmin();
        // Get designs
        $designs = Design::with('user','status','contact')->get();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $designsStatusCount = $this->designsStatusCount();

        return view('admin.designs',compact('designs','user','navbarValues','designsStatusCount'));
    }

    public function designCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $contacts = Contact::all();
        // Categories
        $categories = Category::all();

        return view('admin.design_create',compact('user','contacts','categories','navbarValues'));
    }

    public function designStore(Request $request)
    {

        $design = new Design();
        $design->name = $request->name;
        $design->description = $request->description;
        $design->date = date('Y-m-d', strtotime($request->date));

        //
        if($request->is_project == "on"){
            $design->is_project = True;
            $design->project_id = $request->project;
        }else{
            $design->is_project = False;
        }
        if($request->is_deal == "on"){
            $design->is_deal = True;
            $design->deal_id = $request->deal;
        }else{
            $design->is_deal = False;
            $design->deal_id = '';
        }

        $design->views = 0;
        $design->gallery_views = 0;
        $design->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $design->user_id = Auth::user()->id;
        $design->save();

        foreach ($request->categories as $designCategoryId){
            $designCategory = new DesignCategory();
            $designCategory->design_id = $design->id;
            $designCategory->category_id = $designCategoryId;
            $designCategory->user_id = Auth::user()->id;
            $designCategory->save();
        }

        foreach ($request->contacts as $designRequestContact){
            $designContact = new DesignContact();
            $designContact->design_id = $design->id;
            $designContact->contact_id = $designRequestContact;
            $designContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $designContact->user_id = Auth::user()->id;
            $designContact->save();
        }

        return redirect()->route('admin.design.show',$design->id)->withSuccess('Design '.$design->name.' succesfully created');
    }

    public function designShow($design_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get design aggregations
        $designArray = $this->getDesign($design_id);
        // Get views and downloads
        $designViews = $this->getDesignViews($design_id);
        // Clients
        $contacts = Contact::all();
        // Categories
        $categories = Category::all();
        // Get typography
        $typographies = Typography::all();
        // Get design
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_categories','user','status','cover_image','expenses.expense_type')->first();
        // design albums
        $designAlbums = Album::with('user','status')->where('design_id',$design_id)->withCount('album_views')->get();
        // design journals
        $designJournals = Journal::with('user','status')->where('design_id',$design_id)->get();
        // Design status
        $designStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','design')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('design_id',$design->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','design')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('design_id',$design->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','design')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('design_id',$design->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','design')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('design_id',$design->id)->get();

        $designGallery = DesignGallery::where('design_id',$design_id)->with('upload')->get();
        $designWork = DesignWork::where('design_id',$design_id)->with('upload')->get();

        // design categories
        $designCategories = DesignCategory::where('design_id',$design_id)->get();
        // design contacts
        $designContacts = DesignContact::where('design_id',$design_id)->get();
        return view('admin.design_show',compact('designCategories','designContacts','designJournals','designAlbums','pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','contacts','categories','design','designGallery','designWork','designStatuses','typographies','navbarValues','designArray','designViews'));
    }

    public function designPersonalAlbumCreate($design_id)
    {
        // get design
        $design = Design::findOrFail($design_id);
        // Tags
        $tags = Tag::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.design_personal_album_create',compact('user','tags','navbarValues','design'));
    }

    public function designClientProofCreate($design_id)
    {
        // get design
        $design = Design::findOrFail($design_id);
        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.design_client_proof_create',compact('design','user','tags','contacts','navbarValues'));
    }

    public function designJournalCreate($design_id)
    {
        // get design
        $design = Design::findOrFail($design_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.design_journal_create',compact('design','user','labels','navbarValues'));
    }

    public function designUpdate(Request $request, $design_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if design exists and get
        $design = Design::findOrFail($design_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $design->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the design to published.'));
        }

        $design->name = $request->name;
        $design->description = $request->description;
        $design->status_id = $request->status;
        $design->date = date('Y-m-d', strtotime($request->date));
        $design->save();

        // Design categories update
        $designRequestCategories =array();
        foreach ($request->categories as $designCategory){
            // Append to array
            $designRequestCategories[]['id'] = $designCategory;

            // Check if design category exists
            $designCategory = DesignCategory::where('design_id',$design->id)->where('category_id',$designCategory)->first();

            if($designCategory === null) {
                $designCategory = new DesignCategory();
                $designCategory->design_id = $design->id;
                $designCategory->category_id = $designCategory;
                $designCategory->user_id = Auth::user()->id;
                $designCategory->save();
            }
        }

        $designCategoriesIds = DesignCategory::where('design_id',$design_id)->whereNotIn('category_id',$designRequestCategories)->select('id')->get()->toArray();
        DB::table('design_categories')->whereIn('id', $designCategoriesIds)->delete();


        // Design contacts update
        $designRequestContacts =array();
        foreach ($request->contacts as $designDesignContact){
            // Append to array
            $designRequestContacts[]['id'] = $designDesignContact;

            // Check if design contact exists
            $designContact = DesignContact::where('design_id',$design->id)->where('contact_id',$designDesignContact)->first();

            if($designContact === null) {
                $designContact = new DesignContact();
                $designContact->design_id = $design->id;
                $designContact->contact_id = $designDesignContact;
                $designContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $designContact->user_id = Auth::user()->id;
                $designContact->save();
            }
        }

        $designContactsIds = DesignContact::where('design_id',$design_id)->whereNotIn('contact_id',$designRequestContacts)->select('id')->get()->toArray();
        DB::table('design_contacts')->whereIn('id', $designContactsIds)->delete();


        return back()->withSuccess(__('Design successfully uploaded.'));
    }

    public function designCoverImageUpload(Request $request,$design_id)
    {

//        return $request;
        $design = Design::where('id',$design_id)->first();
        $folderName = str_replace(' ', '', $design->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $design->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/design/".$design->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/design/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);

            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);

            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
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

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->design_id = $design_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update design cover image
        $design = Design::findOrFail($design_id);
        $design->cover_image_id = $upload->id;
        $design->save();

        return back()->withSuccess(__('Design cover image successfully uploaded.'));
    }

    public function designWorkStore(Request $request,$design_id)
    {
//        return $request;
        // Save design work
        // Update album cover image
        $designWork = new DesignWork();
        $designWork->name = $request->name;
        $designWork->description = $request->description;
        $designWork->views = 0;
        $designWork->upload_id = $design_id;
        $designWork->design_id = $design_id;
        $designWork->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designWork->user_id = Auth::user()->id;
        $designWork->save();

        // todo If already image delete
        // todo hash the folder name
        $folderName = str_replace(' ', '', $designWork->design->name."/" .$designWork->name.'/');
        $originalFolderName = str_replace(' ', '', $designWork->design->name."/Original/" .$designWork->name.'/');

        $pixel100FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/100/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/300/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/750/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/1000/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/1500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/2500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/3600/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("design_work");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/design/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
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

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->design_id = $designWork->design_id;
        $upload->design_work_id = $designWork->id;
        $upload->upload_type_id = "b64c0d17-2e06-4b1e-83ed-55cd606ff4fe";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update design work upload
        $designWork = DesignWork::findOrFail($designWork->id);
        $designWork->upload_id = $upload->id;
        $designWork->save();

        // Save new design work gallery
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = True;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $designWork->design_id;
        $designGallery->design_work_id = $designWork->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

        return back()->withSuccess(__('Design work successfully uploaded.'));
    }

    public function designWorkUpdate(Request $request,$design_work_id)
    {
//        return $request;
        // Save design work
        // Update album cover image
        $designWork = DesignWork::findOrFail($design_work_id);

        // todo If already image delete
        // todo hash the folder name
        // todo if name changed delete old folder
        // todo change description and name without having to upload image
        $folderName = str_replace(' ', '', $designWork->design->name."/" .$designWork->name.'/');
        $originalFolderName = str_replace(' ', '', $designWork->design->name."/Original/" .$designWork->name.'/');

        $pixel100FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/100/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/300/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/750/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/1000/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/1500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/2500/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/design/".$designWork->design->name."/3600/" .$designWork->name.'/');
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("design_work");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/design/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
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

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->design_id = $designWork->design_id;
        $upload->design_work_id = $designWork->id;
        $upload->upload_type_id = "b64c0d17-2e06-4b1e-83ed-55cd606ff4fe";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Design gallery record
        // Delete previous design gallery work
        $previousDesignWorkGallery = DesignGallery::where('upload_id',$designWork->upload_id)->where('is_design_work',True)->first();
        if ($previousDesignWorkGallery){
            $previousDesignWorkGallery->delete();
        }

        // Update design work upload
        $designWork->name = $request->name;
        $designWork->description = $request->description;
        $designWork->upload_id = $upload->id;
        $designWork->save();

        // Save new design work gallery
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = True;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $designWork->design_id;
        $designGallery->design_work_id = $designWork->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

        return back()->withSuccess(__('Design work successfully updated.'));
    }

    public function designGalleryImageUpload(Request $request,$design_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $design = Design::where('id',$design_id)->first();
        $folderName = str_replace(' ', '', $design->name.'/');
        $originalFolderName = str_replace(' ', '', $design->name."/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/design/".$design->name."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/design/".$design->name."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/design/".$design->name."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/design/".$design->name."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/design/".$design->name."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/design/".$design->name."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/design/".$design->name."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/design/".$design->name."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/design/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
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

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->is_album_set_image = False;
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->upload_type_id = "720a967d-16b1-46c4-b22d-9e734e94c9e9";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Design gallery record
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = False;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $design->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

//        return $originalFolderName;




        return back()->withSuccess(__('Design gallery image successfully uploaded.'));
    }

    public function designUpdateDesign(Request $request, $design_id)
    {
        $design = Design::findOrFail($design_id);
        $design->typography_id = $request->typography;
        $design->save();

        return back()->withSuccess('Design design updated!');
    }

    public function designDelete($album_type_id)
    {

        $design = Tag::findOrFail($album_type_id);
        $design->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $design->save();

        return back()->withSuccess(__('Tag '.$design->name.' successfully deleted.'));
    }

    public function designRestore($album_type_id)
    {

        $design = Tag::findOrFail($album_type_id);
        $design->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $design->save();

        return back()->withSuccess(__('Tag '.$design->name.' successfully restored.'));
    }
}
