<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\ToDo;
use App\Album;
use App\Label;
use App\Status;
use App\Design;
use App\Upload;
use App\Journal;
use App\Contact;
use App\Project;
use App\Category;
use App\Typography;
use App\DesignWork;
use App\ProjectType;
use App\DesignContact;
use App\DesignGallery;
use App\ThumbnailSize;
use App\ProjectContact;
use App\DesignCategory;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use App\Traits\ProjectTrait;
use Illuminate\Http\Request;
use App\Traits\StatusCountTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use ProjectTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function projects()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the project status counts
        $projectsStatusCount = $this->projectsStatusCount();
        // Get albums
        $projects = Project::with('user','status','project_type')->get();

        return view('admin.projects',compact('projects','user','navbarValues','projectsStatusCount'));
    }

    public function projectCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $contacts = Contact::all();
        // project types
        $projectTypes = ProjectType::all();
        return view('admin.project_create',compact('user','contacts','projectTypes','navbarValues'));
    }

    public function projectStore(Request $request)
    {

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->date = date('Y-m-d', strtotime($request->date));

        if($request->is_deal == "on"){
            $project->is_deal = True;
            $project->deal_id = $request->deal;
        }else{
            $project->is_deal = False;
        }

        $project->views = 0;
        $project->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $project->project_type_id = $request->project_type;
        $project->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $project->user_id = Auth::user()->id;
        $project->save();

        if($request->contacts){
            foreach ($request->contacts as $projectRequestContact){
                $projectContact = new ProjectContact();
                $projectContact->project_id = $project->id;
                $projectContact->contact_id = $projectRequestContact;
                $projectContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $projectContact->user_id = Auth::user()->id;
                $projectContact->save();
            }
        }

        return redirect()->route('admin.project.show',$project->id)->withSuccess('Project '.$project->name.' succesfully created');
    }

    public function projectShow($project_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get project aggregations
        $projectArray = $this->getProject($project_id);
        // Get views and downloads
        $projectViews = $this->getProjectViews($project_id);
        // Clients
        $contacts = Contact::all();
        // Get typography
        $typographies = Typography::all();
        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // project types
        $projectTypes = ProjectType::all();
        // Get project
        $project = Project::findOrFail($project_id);
        $project = Project::where('id',$project_id)->with('user','status','cover_image')->first();
        // project albums
        $projectAlbums = Album::with('user','status')->where('project_id',$project_id)->withCount('album_views')->get();
        // project designs
        $projectDesigns = Design::with('user','status','design_contacts.contact')->where('project_id',$project_id)->get();
        // project journals
        $projectJournals = Journal::with('user','status')->where('project_id',$project_id)->get();
        // project contacts
        $projectContacts = ProjectContact::where('project_id',$project_id)->get();
        // Project status
        $projectStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        return view('admin.project_show',compact('projectContacts','projectJournals','projectDesigns','projectAlbums','user','contacts','project','projectStatuses','typographies','thumbnailSizes','projectTypes','navbarValues','projectArray','projectViews'));
    }

    public function projectPersonalAlbumCreate($project_id)
    {
        // get project
        $project = Project::findOrFail($project_id);
        // Tags
        $tags = Tag::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.project_personal_album_create',compact('user','tags','navbarValues','project'));
    }

    public function projectClientProofCreate($project_id)
    {
        // get project
        $project = Project::findOrFail($project_id);
        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.project_client_proof_create',compact('project','user','tags','contacts','navbarValues'));
    }

    public function projectDesignCreate($project_id)
    {
        // get project
        $project = Project::findOrFail($project_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Tags
        $contacts = Contact::all();
        // Categories
        $categories = Category::all();

        return view('admin.project_design_create',compact('project','user','contacts','categories','navbarValues'));
    }

    public function projectJournalCreate($project_id)
    {
        // get project
        $project = Project::findOrFail($project_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.project_journal_create',compact('project','user','labels','navbarValues'));
    }

    public function projectUpdate(Request $request, $project_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if project exists and get
        $project = Project::findOrFail($project_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $project->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the project to published.'));
        }

        $project->name = $request->name;
        $project->description = $request->description;
        $project->body = $request->body;
        $project->project_type_id = $request->project_type;
        $project->thumbnail_size_id = $request->thumbnail_size;
        $project->typography_id = $request->typography;
        $project->status_id = $request->status;
        $project->date = date('Y-m-d', strtotime($request->date));
        $project->save();

        if($request->contacts){
            // Design contacts update
            $projectRequestContacts =array();
            foreach ($request->contacts as $projectDesignContact){
                // Append to array
                $projectRequestContacts[]['id'] = $projectDesignContact;

                // Check if project contact exists
                $projectContact = ProjectContact::where('project_id',$project->id)->where('contact_id',$projectDesignContact)->first();

                if($projectContact === null) {
                    $projectContact = new ProjectContact();
                    $projectContact->project_id = $project->id;
                    $projectContact->contact_id = $projectDesignContact;
                    $projectContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                    $projectContact->user_id = Auth::user()->id;
                    $projectContact->save();
                }
            }

        $projectContactsIds = ProjectContact::where('project_id',$project_id)->whereNotIn('contact_id',$projectRequestContacts)->select('id')->get()->toArray();
        DB::table('project_contacts')->whereIn('id', $projectContactsIds)->delete();

        }


        return back()->withSuccess(__('Project successfully uploaded.'));
    }

    public function projectCoverImageUpload(Request $request,$project_id)
    {

//        return $request;
        $project = Project::where('id',$project_id)->first();
        $folderName = str_replace(' ', '', $project->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $project->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/project/".$project->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/project/".$project->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/project/".$project->name."/Cover Image"."/1500/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/project/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/project/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);

            Image::make( $path )->fit(460, 460, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);

            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);


        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);

            Image::make( $path )->fit(460, 460, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);

            Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);


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

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = False;
        $upload->project_id = $project_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update project cover image
        $project = Project::findOrFail($project_id);
        $project->cover_image_id = $upload->id;
        $project->save();

        // delete original file
        File::delete($path);

        return back()->withSuccess(__('Project cover image successfully uploaded.'));
    }

    public function projectUpdateDesign(Request $request, $project_id)
    {
        $project = Project::findOrFail($project_id);
        $project->typography_id = $request->typography;
        $project->thumbnail_size_id = $request->thumbnail_size;
        $project->save();

        return back()->withSuccess('Project design updated!');
    }

    public function projectDelete($album_type_id)
    {

        $project = Project::findOrFail($album_type_id);
        $project->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $project->save();

        return back()->withSuccess(__('Project '.$project->name.' successfully deleted.'));
    }

    public function projectRestore($album_type_id)
    {

        $project = Project::findOrFail($album_type_id);
        $project->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $project->save();

        return back()->withSuccess(__('Project '.$project->name.' successfully restored.'));
    }
}
