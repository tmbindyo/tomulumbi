<?php

namespace App\Http\Controllers\Admin;

use App\AlbumTag;
use App\Contact;
use App\Journal;
use App\JournalGallery;
use App\JournalLabel;
use App\Label;
use App\Project;
use App\ProjectGallery;
use App\ProjectType;
use App\Status;
use App\ThumbnailSize;
use App\ToDo;
use App\Traits\DownloadViewNumbersTrait;
use App\Traits\JournalTrait;
use App\Traits\NavbarTrait;
use App\Traits\StatusCountTrait;
use App\Traits\UserTrait;
use App\Typography;
use DB;
use App\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JournalSeries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class JournalController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use JournalTrait;
    use StatusCountTrait;
    use DownloadViewNumbersTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function journalSeriesCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get journal series
        $journalSeries = JournalSeries::all();
        return view('admin.journal_series_create',compact('journalSeries','user','navbarValues'));
    }

    public function journalSeriesStore(Request $request)
    {

        $journalSeries = new JournalSeries();
        $journalSeries->name = $request->name;
        $journalSeries->description = $request->description;
        if($request->is_journal_series == "on"){
            $journalSeries->is_journal_series = True;
            $journalSeries->journal_series_id = $request->journal_series;
        }else{
            $journalSeries->is_journal_series = False;
        }
        $journalSeries->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $journalSeries->user_id = Auth::user()->id;
        $journalSeries->save();

        return redirect()->route('admin.journal.series.show',$journalSeries->id)->withSuccess('Journal series updated!');
    }

    public function journalSeriesShow($journal_series_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get journal series
        $journalSerieses = JournalSeries::all();

        // Get journal series
        $journalSeries = JournalSeries::findOrFail($journal_series_id);
        $journalSeries = JournalSeries::where('id',$journal_series_id)->with('user','status')->first();
        // project journals
        $journalSeriesJournals = Journal::with('user','status')->where('journal_series_id',$journal_series_id)->get();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','journal_series')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('journal_series_id',$journalSeries->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','journal_series')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('journal_series_id',$journalSeries->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','journal_series')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('journal_series_id',$journalSeries->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','journal_series')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('journal_series_id',$journalSeries->id)->get();


        return view('admin.journal_series_show',compact('journalSeriesJournals','journalSeries','overdueToDos','completedToDos','inProgressToDos','pendingToDos','journalSerieses','user','navbarValues'));
    }

    public function journalSeriesJournalCreate($journal_series_id)
    {
        // get journal series
        $journalSeries = JournalSeries::findOrFail($journal_series_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.journal_series_journal_create',compact('journalSeries','user','labels','navbarValues'));
    }


    // journals
    public function journals()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->journalsStatusCount();
        // Get journals
        $journals = Journal::with('user','status')->get();
        // get journal series
        $journalSeries = JournalSeries::with('user','status')->withCount('journals')->get();


        return view('admin.journals',compact('journalSeries','journals','user','navbarValues','journalsStatusCount'));
    }

    public function journalCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.journal_create',compact('user','labels','navbarValues'));
    }

    public function journalStore(Request $request)
    {

        $journal = new Journal();
        $journal->name = $request->name;
        $journal->description = $request->description;
        $journal->color = $request->color;
        $journal->date = date('Y-m-d', strtotime($request->date));

        if($request->is_project == "on"){
            $journal->is_project = True;
            $journal->project_id = $request->project;
        }else{
            $journal->is_project = False;
        }
        if($request->is_design == "on"){
            $journal->is_design = True;
            $journal->design_id = $request->design;
        }else{
            $journal->is_design = False;
        }
        if($request->is_album == "on"){
            $journal->is_album = True;
            $journal->album_id = $request->album;
        }else{
            $journal->is_album = False;
        }
        if($request->is_journal_series == "on"){
            $journal->is_journal_series = True;
            $journal->journal_series_id = $request->journal_series;
        }else{
            $journal->is_journal_series = False;
        }

        $journal->views = 0;
        $journal->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $journal->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $journal->user_id = Auth::user()->id;
        $journal->save();

        foreach ($request->labels as $journalLabelLabel){
            $journalAlbum = new JournalLabel();
            $journalAlbum->journal_id = $journal->id;
            $journalAlbum->label_id = $journalLabelLabel;
            $journalAlbum->user_id = Auth::user()->id;
            $journalAlbum->save();
        }

        return redirect()->route('admin.journal.show',$journal->id)->withSuccess('Journal '.$journal->name.' succesfully created');
    }

    public function journalShow($journal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get project aggregations
        $journalArray = $this->getJournal($journal_id);
        // Get views and downloads
        $journalViews = $this->getJournalViews($journal_id);
        // Get typography
        $typographies = Typography::all();
        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // Labels
        $labels = Label::all();
        // Get journal
        $journal = Journal::findOrFail($journal_id);
        $journal = Journal::where('id',$journal_id)->with('user','status','cover_image')->first();
        // Journal status
        $journalStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','journal')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('journal_id',$journal->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','journal')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('journal_id',$journal->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','journal')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('journal_id',$journal->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','journal')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('journal_id',$journal->id)->get();

        // journal gallery
        $journalGallery = JournalGallery::where('journal_id',$journal_id)->with('upload')->get();
        $journalLabels = JournalLabel::where('journal_id',$journal_id)->with('journal','label')->get();
        return view('admin.journal_show',compact('pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','journal','journalGallery','journalStatuses','typographies','thumbnailSizes','labels','journalLabels','navbarValues','journalArray','journalViews'));
    }

    public function journalUpdate(Request $request, $journal_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if journal exists and get
        $journal = Journal::findOrFail($journal_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $journal->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the journal to published.'));
        }


        // Journal labels update
        $journalRequestLabels =array();
        foreach ($request->labels as $journalAlbumLabel){
            // Append to array
            $journalRequestLabels[]['id'] = $journalAlbumLabel;

            // Check if journal label exists
            $journalLabel = JournalLabel::where('journal_id',$journal->id)->where('label_id',$journalAlbumLabel)->first();

            if($journalLabel === null) {
                $journalLabel = new JournalLabel();
                $journalLabel->journal_id = $journal->id;
                $journalLabel->label_id = $journalAlbumLabel;
                $journalLabel->user_id = Auth::user()->id;
                $journalLabel->save();
            }
        }

        $journalLabelsIds = JournalLabel::where('journal_id',$journal_id)->whereNotIn('label_id',$journalRequestLabels)->select('id')->get()->toArray();
        DB::table('journal_labels')->whereIn('id', $journalLabelsIds)->delete();

        $journal->name = $request->name;
        $journal->description = $request->description;
        $journal->body = $request->body;
        $journal->thumbnail_size_id = $request->thumbnail_size;
        $journal->typography_id = $request->typography;
        $journal->status_id = $request->status;
        $journal->date = date('Y-m-d', strtotime($request->date));
        $journal->save();


        return back()->withSuccess(__('Journal successfully uploaded.'));
    }

    public function journalCoverImageUpload(Request $request,$journal_id)
    {

//        return $request;
        $journal = Journal::where('id',$journal_id)->first();
        $folderName = str_replace(' ', '', $journal->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $journal->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/journal/".$journal->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/journal/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/journal/".$originalFolderName.$file_name_extension;

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

//            Image::make( $path )->resize(750, null, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save(public_path()."/".$pixel750FolderName.$image_name);

            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);


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

            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);

//            Image::make( $path )->resize(null, 750, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save(public_path()."/".$pixel750FolderName.$image_name);

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
        $upload->journal_id = $journal_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update journal cover image
        $journal = Journal::findOrFail($journal_id);
        $journal->cover_image_id = $upload->id;
        $journal->save();

        return back()->withSuccess(__('Journal cover image successfully uploaded.'));
    }

    public function journalGalleryImageUpload(Request $request,$journal_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $journal = Journal::where('id',$journal_id)->first();
        $folderName = str_replace(' ', '', $journal->name.'/');
        $originalFolderName = str_replace(' ', '', $journal->name."/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/journal/".$journal->name."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/journal/".$journal->name."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/journal/".$journal->name."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/journal/".$journal->name."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/journal/".$journal->name."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/journal/".$journal->name."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/journal/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/journal/".$originalFolderName.$file_name_extension;

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

        // Journal gallery record
        $journalGallery = new JournalGallery();
        $journalGallery->upload_id = $upload->id;
        $journalGallery->journal_id = $journal->id;
        $journalGallery->user_id = Auth::user()->id;
        $journalGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $journalGallery->save();

        return back()->withSuccess(__('Journal gallery image successfully uploaded.'));
    }

    public function journalUpdateDesign(Request $request, $journal_id)
    {
        $journal = Journal::findOrFail($journal_id);
        $journal->typography_id = $request->typography;
        $journal->thumbnail_size_id = $request->thumbnail_size;
        $journal->save();

        return back()->withSuccess('Journal design updated!');
    }

    public function journalDelete($album_type_id)
    {

        $journal = Journal::findOrFail($album_type_id);
        $journal->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $journal->save();

        return back()->withSuccess(__('Journal '.$journal->name.' successfully deleted.'));
    }

    public function journalRestore($album_type_id)
    {

        $journal = Journal::findOrFail($album_type_id);
        $journal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $journal->save();

        return back()->withSuccess(__('Journal '.$journal->name.' successfully restored.'));
    }
}
